
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("127.0.0.1:3307", "root", "", "user_login");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username= mysqli_real_escape_string($link, $_REQUEST['username']);
$passwordData = mysqli_real_escape_string($link, $_REQUEST['password']);
$confirmpassword = mysqli_real_escape_string($link, $_REQUEST['confirmpassword']);

$passwordData=md5($passwordData);
 
// attempt insert query execution
$sql = "INSERT INTO user_details (username, password ,confirmpassword) VALUES ('$username', '$passwordData','$confirmpassword')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully!!!!!.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
