<?php
    include ('connect.php');
?>
<?php
  session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    {
            $username = $_POST['uname'];
            $password = $_POST['psw'];
        
            $query = "SELECT * FROM admin WHERE username = '$username' && password = '$password' && is_deleted = 0 limit 1";
            $result = mysqli_query($con,$query);
            $check =  mysqli_fetch_row($result);
            if(mysqli_num_rows($result) == 0)
            {
              $query2 = "SELECT * FROM student_tbl WHERE idnumber = '$username' && password = '$password' && is_active = 'Active' limit 1";
              $result2 = mysqli_query($con,$query2);
              $check =  mysqli_fetch_row($result2);
              if(mysqli_num_rows($result2) == 0)
              {
                $query3 = "SELECT * FROM teacher_tbl WHERE username = '$username' && password = '$password' && is_active = 'Active' limit 1";
                $result3 = mysqli_query($con,$query3);
                $check =  mysqli_fetch_row($result3);
                if(mysqli_num_rows($result3) == 0){
                  echo '<script>alert("Invalid information.Try again")</script>';
                }
                else
                {
                  $_SESSION['username'] = $username;
                  header("Location: ../teacher/headerteacher.php");
                  die;
                }
              }
              else
              {
                $_SESSION['username'] = $username;
                header("Location: user.php");
                die;
              }
            }
            else
            {
              $_SESSION['username'] = $username;
              header("Location: /admin/admin.php");
              die;
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login3.css">
</head>
<body>

<section>
    <div class="color"></div>
    <div class="color"></div>
    <div class="color"></div>
    <div class="box">
      <div class="square" style="--i:0;"></div>
      <div class="square" style="--i:1;"></div>
      <div class="square" style="--i:2;"></div>
      <div class="square" style="--i:3;"></div>
      <div class="square" style="--i:4;"></div>
       <div class="container">
         <div class="form">
           <h2>Login Form</h2>
           <form action="" method="POST">
             <div class="inputBox">
               <input type="text" placeholder="Username" name="uname" required>
             </div>
             <div class="inputBox">
               <input type="password" placeholder="Password" name="psw" required>
             </div>
             <div class="inputBox">
               <input type="submit" value="Login"  name="submit">
             </div>
           </form>
         </div>
       </div>
    </div>
</section>
</body>
</html>

