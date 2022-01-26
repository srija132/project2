<?php
// Start the session
session_start();
?>

<html>
<!DOCTYPE html>
<!--www.codingflicks.com--> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Transparent Login Form HTML CSS</title>
	<link href="sbook.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: green;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: lightgreen;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>
</head>
<body>

	<div class="form-box">
		<div class="header-text">
        <form id="book"  method="post">
			Choose your Resource<br>
            <br>
            <div class="custom-select" style="width:200px; ">
            <select name="book">
                <option value="0">Select Resource</option>
                <option value="playground">Playground</option>
                <option value="digitalclassrooms">digitalclassrooms</option>
                <option value="laboratories">laboratories</option>
            </optgroup>
            </select>
            </div>
            
            <input type="submit" name="submit" value="submit" />
            </form>
	</div>
    <script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
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
</div>
</body>
</html>
