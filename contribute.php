<html>
    <head>
        <title>Contribution</title>
      
    </head>
    <?php
    $GLOBALS['i'] = 1;
    ?>
    <body>
                </form>
                    <form id="contribute" method="post">
                    <input type="text"   name="Schoolname"  placeholder="Schoolname" required>
                    <input type="text"   name="Resource" placeholder="Enter Resource" required>
                    <input type="date"   name="Date" placeholder="Enter Date" required>
                    <input type="submit" name="submit" value="submit" />
                </form>
                <?php


if (isset($_POST['submit'])) 
  {
      echo "hello";
   $Schoolname=$_POST['Schoolname'];   
   $Resource=$_POST['Resource'];
   $Date=$_POST['Date'];
   
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
$sql = "INSERT INTO contribute (Schoolname,Resource,Date,Status)
VALUES ('$Schoolname','$Resource', '$Date','empty')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();





} 
