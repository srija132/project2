<html>
    <head>
        <title>login and registration form</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="hero">
            <div class="form-box">
                <!-- <div class="button-box">
                    <div id="btn"></div>
                    <button type="button"class="toggle-btn" onclick="login()">Login</button>
                    <button type="button"class="toggle-btn" onclick="signup()">Sign up</button>
                </div>
                <div class="social-icons">
                    <img src="pics/fb.png">
                    <img src="pics/insta.png">
                    <img src="pics/twitter.jpg">
                </div> -->
                 <!-- <form id="login" class="input-group" method="post">
                    <input type="text" class="input-field" placeholder="User Name" required>
                    <input type="password" class="input-field" placeholder="Enter Password" required>
                    <input type="checkbox" class="check-box"><span>Remember password</span>
                    <input type="submit" value="Login" class="submit-btn" /> 
                </form>  -->
                <form id="signup"  method="post">
                    <input type="text" class="input-field" name="UserName" placeholder="User Name" required>
                    <input type="email" class="input-field" name="Email"  placeholder="Email Id" required>
                    <input type="password" class="input-field" name="Password" placeholder="Enter password" required>
                    <input type="password" class="input-field"  name="ConfirmPassword" placeholder="Confirm password" required>
                    <input type="text" class="input-field"  name="Phoneno" placeholder="PhoneNo" required>
                    <input type="checkbox" class="check-box"><span>I agree to the terms and conditions </span>
                    <input type="submit" name="submit" value="submit" />
                </form>
            </div>
            
        </div>
        <!-- <script>
            var x= document.getElementById("login");
            var y= document.getElementById("signup");
            var z= document.getElementById("btn");

            function signup(){
                x.style.left= "-400px";
                y.style.left= "50px";
                z.style.left= "110px";
            }
            function login(){
                x.style.left= "50px";
                y.style.left= "450px";
                z.style.left= "0px";
            }



        </script> -->
<?php

if (isset($_POST['submit'])) 
  {
      echo "hello";
   $name=$_POST['UserName'];   
   $Email=$_POST['Email'];
   $Password=$_POST['Password'];
   $ConfirmPassword=$_POST['ConfirmPassword'];
   $Phoneno=$_POST['Phoneno'];
   
   @mysql_connect('localhost','root','')or die('Could not connect to database');
	mysql_select_db('resourceallocation');
	
   
   $sql3="INSERT INTO signup VALUES($name, $Email,$Password,$Phoneno)";
   $result3=mysql_query($sql3) or trigger_error(mysql_error().$sql3);
   
echo "Login details Saved"; 


} 
 ?>





    </body>
</html>