<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<HTML>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

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

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #1E52A8;
}

.logbtn {
  width: auto;
  padding: 10px 18px;
  background-color: darkgray;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}


.cancelbtn1 {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn1, .signupbtn {
  float: left;
  width: 50%;
}


.container {
  margin:  auto;
  padding: auto;
  width: 50%;
  position: absolute;
  left: 50%;
  top: 25%;
  transform: translate(-50%, -50%);

  padding: 10px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
span.psw {
  float: right;
  padding-top: 16px;
}


.disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

</style>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saltire Sports</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
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
        <li><a href="system.php">Managment System</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>



<div class="container" id="1">

<?php

    session_start();

    if ($_SESSION['status'] == 'Admin'){
        echo "<h2>Admin: Saltire Sports Users List</h2>";
        echo <<<GFG

        GFG;
    }
    else{
        echo "<script>location.href='login.php'</script>";
    }
?>
<form name='form1' id='form1' action="index.html" method="post">
    <button type="submit" class="cancelbtn" formaction="newUserForm.php">Add Users</button>
    <button type="submit" class="cancelbtn" formaction="EditUserForm.php">Edit Users</button>
    <button type="submit" class="cancelbtn" formaction="DeleteUserForm.php" >Delete Users</button>

    
    <button type="submit" class="logbtn" target="_blank" formaction="users.csv">Users Log</button>
    <button type="submit" class="logbtn" target="_blank" formaction="log.txt" >Activity Log</button>
    <button type="submit" class="logbtn" formaction="marketing.txt">Marketing Log</button>
    <br><br>

<?php
echo '<table border="1">';
$start_row = 1;
if (($csv_file = fopen("users.csv", "r")) !== FALSE) {
  while (($read_data = fgetcsv($csv_file, 1000, ",")) !== FALSE) {
    $column_count = count($read_data);
  echo '<tr>';
    $start_row++;
    for ($c=0; $c < $column_count; $c++) {
        echo "<td>".$read_data[$c] . "</td>";
    }
  echo '</tr>';
  }
  fclose($csv_file);
}
echo '</table>';
?>

</div>


<footer>
    <p>&copy; Copyright 2021 Fouad Rabah</p>
</footer>


</body>
</html>

