<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="../../pics/signup.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <h2>Registration form</h2>
                    
                            <div class="form-group">
                                <label for="school_name">School Name :</label>
                                <input type="text" name="UserName" id="UserName" required/>
                            </div>
                        
                        <div class="form-group">
                            <label for="address">Address :</label>
                            <input type="text" name="address" id="address" required/>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="state">State :</label>
                                <input type="text" name="state" id="state" required/>
                            </div>
                            <div class="form-group">
                                <label for="city">City :</label>
                                <input type="text" name="city" id="City" required/>
                            </div>
                            </div>
                            
                    
                        <div class="form-group">
                            <label for="pincode">Pincode :</label>
                            <input type="text" name="pincode" id="pincode">
                        </div>
                        <div class="form-group">
                            <label for="pincode">Phone Number :</label>
                            <input type="text" name="Phoneno" id="Phoneno">
                        </div>
                        <div class="form-group">
                            <label for="board">Board :</label>
                            <div class="form-select">
                                <select name="board" id="board">
                                    <option value=""></option>
                                    <option value="cbse">CBSE</option>
                                    <option value="ssc">SSC</option>
                                    <option value="icse">ICSE</option>
                                </select>
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID :</label>
                            <input type="email" name="Email" id="Email" />
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password :</label>
                            <input type="password" name="Password" id="Password" />
                        </div>
                        <div class="form-group">
                            <label for="pwd">Confirm Password :</label>
                            <input type="password" name="ConfirmPassword" id="ConfirmPassword" />
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit" class="submit" name="submit" id="submit" onclick="matchPassword()" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js">
        function matchPassword() {  
  var pw1 = document.getElementById("pswd1");  
  var pw2 = document.getElementById("pswd2");  
  if(pw1 != pw2)  
  {   
    alert("Passwords did not match");  
  } else {  
    alert("Password created successfully");  
  }  
}  
    </script>
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
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>