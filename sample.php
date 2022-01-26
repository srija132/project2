<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Transparent Login Form HTML CSS</title>
      <link rel="stylesheet" href="sample.css">
      <link rel="stylesheet" href="contactheader.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
    <div class="bg-img">
   <div class="wrapper">
        <nav>
            <ul>
            <li><a href="WEBSITE.php">HOME</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">RESOURCES </a></li>
                <li><a href="#">STATISTICS</a></li>
                <li><a href="colorlib-regform-15/colorlib-regform-15/signupfinal.php">SIGN UP</a></li>
                <li><a href="login-form-01/login-form-01/login.php">LOGIN</a></li>
                <li><a href="contact.html">CONTACT US</a></li>
            </ul>
        </nav>

         <div class="content">
            <header>Contribute your Resources</header>
            <form  method="post">
               <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" required placeholder="Enter your school name" name="Schoolname">
               </div>
               <div class="field space">
                  <span class="fa fa-user"></span>
                  <input type="text" class="pass-key" required placeholder="Enter the Resource" name="Resource">
               </div>
               <div class="field space">
                <span class="fa fa-user"></span>
                <input type="date" required placeholder="Enter the date" name="Date">
             </div>
               <div class="field space">
                  <input type="submit" value="Contribute" name="submit">
               </div>
      </div>
      </div>
</div>
      <script>
         const pass_field = document.querySelector('.pass-key');
         const showBtn = document.querySelector('.show');
         showBtn.addEventListener('click', function(){
          if(pass_field.type === "password"){
            pass_field.type = "text";
            showBtn.textContent = "HIDE";
            showBtn.style.color = "#3498db";
          }else{
            pass_field.type = "password";
            showBtn.textContent = "SHOW";
            showBtn.style.color = "#222";
          }
         });
      </script>
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
        header("Location: WEBSITE.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
      
      
      
      
      
      } 