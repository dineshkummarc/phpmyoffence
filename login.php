
<?php
  session_start();
  if(ISSET($_SESSION['username'])){
    header("location:home.php");
  }
?>
<?php
   if (isset($_POST['login']))
            { 
            include("connect.php");    
            // Include("config.php");
            $username=$_POST['username'];
            $password = $_POST['password'];
            $_SESSION['username']=$email; 
            $query = mysqli_query( $conn, "SELECT * FROM admin WHERE username='$username' and password='$password'");
                 if (mysqli_num_rows($query) != 0)
                {
                 echo "<script language='javascript' type='text/javascript'> location.href='home.php' </script>";   
                  }
                       else if(mysqli_num_rows($query) == 0){
                      echo "<script>
                      alert('Wrong username or password. Please try again');
                      window.open('index.php','_self');
                       </script>";
                      }
                        }
        ?>