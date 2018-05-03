
<?php
session_start();
?>
<html>
    <body> </body>
        <h1>
          <?php  echo  "Welcome!!!!!!".$_SESSION['username']; ?></h1>
      <form  method="POST" enctype="multipart/form-data" action="<?php $_SERVER["PHP_SELF"];?>">
     Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
     
      </form>   


<?php
 
 $username=$_SESSION['username'];
 $db = new mysqli("127.0.0.1:3307", "root", "", "user_login");
$statusMsg = '';
if(isset($_POST["submit"]) && !empty($_FILES['file']['name'])){
// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES['file']['name']); //Given a string containing the path to a file 
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

//if(isset($_POST["submit"]) && !empty($_FILES['file']['name'])){
  
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
            // Insert image file name into database
            header("Location:welcome.php");
            $insert = $db->query("INSERT into picture (username, path) VALUES ('$username','".$fileName."')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
            echo "</br>";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG,files are allowed to upload.' ;
    }
}

// Display status message
   echo $statusMsg;
?>


<?php
     if(!$_SESSION['username']==NULL)
     {
     $result = mysqli_query($db, "SELECT * FROM picture  where username = '$username'");
   
    while ($row = mysqli_fetch_array($result)) {//fetches a result row 
       
       echo "<img class ='px-3 mt-3' height='150' width='150' src='uploads/".$row['path']."' >";
      
       $result1 = mysqli_query($db, "delete FROM picture  where username = '$username'");
      
    }
    
     }
    
  ?>

</html>