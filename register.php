<!DOCTYPE html>
<html>
<head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
</head>
<!------ Include the above in your HEAD tag ---------->
<body>

<div class="container" >

<form class="well span4" style= "margin-left: 359px" method="post" action="database.php">
  <div class="row">
    	<div class="span3">
	 	<div  >
		      <h1> REGISTRATION FORM <h1>
		</div>
			<label> Name</label>
			<input type="text" class="span4"    required name="username">   
		         <label>Password :</label>
                           <input id="password" name="password" class="span4"    required type="password">
                            <label> Confirm Password :</label>
                           <input id=" confirmpassword" name="confirmpassword"  class="span4"   required type="password">
			
	
			
                           <p> Already have an account <a href="index.php"><b>Login </b></a>.</p>
	<button type="submit" name="submit"  style= "margin-left: 300px"  class="btn btn-primary ">Register</button>
		</div>
	</div>
</form>
</div>
    
</body>
</html>