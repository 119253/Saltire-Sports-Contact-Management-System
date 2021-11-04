<!DOCTYPE html>
<HTML>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saltire Sports</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>


<body>


  <nav>
    <div class="menu">
      <div class="header">
        <a href="#">SaltaireSports</a>
      </div>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="system.php">Managment System</a></li>
      </ul>
    </div>
  </nav>


<div class="container">
<?php 

    $adminId="user";
    $adminPwd="shipley";

    $userId="admin";
    $userPwd="saltaire";

    session_start();

    if(isset($_SESSION['status'])){
      echo "<script>location.href='system.php'</script>";
    }

    elseif($_POST['uname']==$adminId && $_POST['pwd'] ==$adminPwd) {

    $_SESSION['status']='Admin';
    $attempt = "SUCCESSFUL";

    echo "<script>location.href='admin.php'</script>";
  }

    elseif($_POST['uname']==$userId && $_POST['pwd'] ==$userPwd) {

    $_SESSION['status']='Member';
    $attempt = "SUCCESSFUL";

    echo "<script>location.href='welcome.php'</script>";
  }


    else{
      echo "<script>alert('username or paasword incorrect!')</script>";
      echo "<script>location.href='login.php'</script>";
      $attempt = "UNSUCCESSFUL";
    }

    $time = date("Y/m/d h:i:sa ");

    $clientIp = $_SERVER["REMOTE_ADDR"];

    $browser = $_POST['browser'];

    $uname   = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $width = $_POST['width'];
    $height = $_POST['height'];
    $reselutionFormat = "(" . $width . ' x ' . $height . ")";

    $timeTaken = $_POST['time'];
    $timeTakenFormat = $timeTaken . " Seconds";

    $newLine= "\r\n" . $time . $clientIp . " " . $attempt . " " . $uname . " " . $browser . " " . $reselutionFormat . " " . $timeTakenFormat ; 

    $file = 'log.txt';

    $current = file_get_contents($file);

    $current = $current . $newLine;
    
    file_put_contents($file, $current);




//11-10-2021 09:34:22 LOG002I 194.174.103.125  Successful Login Attempt from Dom (864 x 1536) 5
  ?>


  <footer>
    <p>&copy; Copyright 2021 Fouad Rabah</p>
  </footer>


</body>
</html>


