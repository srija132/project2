<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
img {
  opacity: 0.5;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
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
body {
  background-image: url('login1.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
}

</style>
</head>
<body>

<h2>Login Form</h2>

<form  method="post">
  <div class="imgcontainer >
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Email" name="Email1" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password1" required>
        
    <input type="submit" name=submit value="submit" />
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  
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





    </body>
</html>