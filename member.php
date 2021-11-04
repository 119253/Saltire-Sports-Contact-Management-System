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
        <li><a href="system.php">Managment System</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="container" id="1">


<?php

  session_start();

  if ($_SESSION['status'] == 'Member'){
    echo "<h2>Member: Saltire Sports Users List</h2>";
  }
  else{
    echo "<script>location.href='login.php'</script>";
  }

?>

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
 



  <footer>
    <p>&copy; Copyright 2021 Fouad Rabah</p>
  </footer>



</body>
</html>
