<?php
// Start the session
session_start();
?>

<html>
  <head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<h1>Booking the resources</h1>
<div class="wrapper1">

<form id="book"  method="post">
  <label for="cars">Select a resource:</label>
  <select name="book">
      <option value="library">Library</option>
      <option value="playground">Playground</option>
      <option value="digitalclassrooms">digitalclassrooms</option>
      <option value="laboratories">laboratories</option>
    </optgroup>
  </select>
  <br><br>
  <input type="submit" name="submit" value="submit" />
</form>
</div>
<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "resourceallocation";

 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (!empty($_POST["resources"])) {
   
    $resources = test_input($_POST["resources"]);
  }
if(isset($_POST['submit'])){
   
    if(!empty($_POST['book'])) {
        $selected = $_POST['book'];
        $sql = "SELECT * FROM  contribute where Resource='$selected'  and Status='empty' ";
        $result = $conn->query($sql);
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<tr>';
         echo '<th scope="col">ID</th>';
         echo '<th scope="col">Resource</th>';
         echo ' <th scope="col">School Name</th>';
         echo ' <th scope="col">Date</th>';
        echo'</tr>';
      echo '</thead>';
      echo '<tbody>';
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo '<tr>';
                echo '<form action="" method="post">';
                echo '<td>';
                echo $row['ID'];
                echo '</td>';
                echo '<td>';
                echo  $row["Resource"] ;
                echo '</td>';
                echo '<td>';
                echo $row["Schoolname"] ; 
                echo '</td>';
                echo '<td>';
                echo $row["Date"] ;
                echo '</td>';
                echo "<br>";
                echo '</form>';
                echo '</tr>';
              
}

                
            }
          } 
          echo '</tbody>';
          echo '</table>';

    $a=[];
    $sql = "SELECT * FROM  contribute where Resource='$selected' and Status='empty'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($a,$row['ID']);
          

    }
}
}
echo 'Select the ID you want to choose';
if (isset($_POST['submit'])) {
    {
      $x=0;
      $val=0;
      echo '<form id="value"  method="post">';
      echo '<select name="value" >';
        foreach($a as $x => $val){
          
         
          echo '<option  value =';echo $val ;echo '>';
          echo $val;
          echo '</option>';
        
         
        }
       echo' </select>';
    }
}
echo '<form   method="post">';
  
echo '<input type="submit" value="submit" name="submit1" />';
echo '</form>';
if(isset($_POST['submit1'])){
  echo $_POST['value'];
  $a=$_POST['value'];
  $sql3 = "UPDATE contribute SET Status='Booked' WHERE ID=$a";
  $result3 = $conn->query($sql3);
  
  $sql4 = "SELECT * FROM  contribute where ID= $a";
  $result = $conn->query($sql4);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $schoolID1= $row['ID'];
        $schoolcontribute1=$row['Schoolname'];
        $Resource1=$row['Resource'];
        $Date1=$row['Date'];
        

  }
  $school_booked1= $_SESSION['schoolname'];
  echo $_SESSION['schoolname'];

  $sql5 = "INSERT INTO booked_details(school_booked,schoolID,school_contribute,Resource,Date)
   VALUES ('$school_booked1','$schoolID1', '$schoolcontribute1','$Resource1','$Date1')";
  $result4 = $conn->query($sql5);

}
}
?>


 
</body>
</html>