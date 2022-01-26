


<?php
// Start the session
session_start();
?>


<html>
    <head>
        <title>login and registration form</title>
      
    </head>
    <body>
        
                <form id="signup"  method="post">
                    <input type="text"  name="UserName" placeholder="User Name" required>
                    <input type="text"   name="Email"  placeholder="Email Id" required>
                    <input type="password"   name="Password" placeholder="Enter password" required>
                    <input type="password"    name="ConfirmPassword" placeholder="Confirm password" required>
                    <input type="text"    name="Phoneno" placeholder="PhoneNo" required>
                    <input type="checkbox" class="check-box"><span>I agree to the terms and conditions </span>
                    <input type="submit" name="submit" value="submit" />
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