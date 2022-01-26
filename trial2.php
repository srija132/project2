<?php
// Start the session
session_start();
?>
<html>
    <head>
        <title>login and registration form</title>
      
    </head>
    <body>
                </form>
                    <form id="login" method="post">
                    <input type="text"   name="Email1"  placeholder="Email Id" required>
                    <input type="password"   name="Password1" placeholder="Enter password" required>
                    <input type="submit" name="submit" value="submit" />
                </form>
        
<?php
if (isset($_POST['submit'])) 
{
     
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
    $Email1=$_POST['Email1'];   
    $Password1=$_POST['Password1'];
    $sql = "SELECT * FROM  signup1 ";
    $result = $conn->query($sql);

$flag=0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          
            if( ($row['EmailID']== $Email1)&&($row['Password']== $Password1))
            {
                $flag=1;
                    echo "Login Successful";
                    break;
                   
                }
                
      
      }
      if($flag==0)
      echo "Invalid Username or password";


    }
}
  ?>