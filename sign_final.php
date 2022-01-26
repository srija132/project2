<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}
input[type=submit] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

<form  style="border:1px solid #ccc" method="post">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="email"><b>School name</b></label>
    <input type="text" placeholder="Enter School name" name="UserName" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="Email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="ConfirmPassword" required>

    <label for="psw-repeat"><b>Repeat Phone number</b></label>
    <input type="password" placeholder="Enter phone number" name="Phoneno" required>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <input type="submit" name="submit" class="signupbtn">
    </div>
  </div>
</form>
<?php

if (isset($_POST['submit'])) 
  {
      echo "hello";
      $_SESSION['schoolname']=$_POST['UserName'];
      echo "session";
      echo $_SESSION['schoolname'];
   $name=$_POST['UserName'];   
   $Email=$_POST['Email'];
   $Password=$_POST['Password'];
   $ConfirmPassword=$_POST['ConfirmPassword'];
   $Phoneno=$_POST['Phoneno'];
   

   
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "resourceallocation";
   
 
  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



//    @mysql_connect('localhost','root','')or die('Could not connect to database');
$sql = "INSERT INTO signup1 (UserName, EmailID, Password, PhoneNo)
VALUES ('$name','$Email', '$Password',$Phoneno)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();





} 
 ?>

</body>
</html>
