<?php 

$link = mysqli_connect("127.0.0.1:3307", "root", "", "user_login");
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 echo "hiiiii";
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = ($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $passworddata = md5($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
     
       // $sql = "SELECT username, password FROM user_details WHERE username = ?";
         $sql = "SELECT username,password  FROM user_details WHERE username = ? AND password = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_passworddata);
          
            // Set parameters
            $param_username = $username;
             $param_passworddata= $passworddata;
      
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                  
                // Store result
                mysqli_stmt_store_result($stmt);
              
                // Check if username and password  exists, 
                if(mysqli_stmt_num_rows($stmt) == 1){  
                   
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: welcome.php");
//                    
                } else{
                    // Display an error message if username doesn't exist
                    echo " The username and password is invalid .";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 