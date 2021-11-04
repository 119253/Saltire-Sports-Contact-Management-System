<?php

    session_start();

    if ($_SESSION['status'] == 'Admin'){
        echo "";
    }
    else{
        echo "<script>location.href='login.php'</script>";
    }
?>

<!DOCTYPE html>
<html>

<head>
	<title>Data Upload</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

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
  margin: auto;
  padding: 16px;
  width: 50%;
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

<body>





<form name='form1' id='form1' action="DeleteUser.php" method="post">
  	<div class="container" id="1">

    	<label for="userid"><b>Enter Email of user to be REMOVED</b></label>
    	<input type="text" placeholder="Enter Email" name="email">
        
    <button type="submit"  class="signupbtn" formaction="DeleteUser.php">Submit</button>
		<button type="sumbit" class="cancelbtn1" formaction="admin.php">Cancel</button>


   </div>

  </form>


</body>
</html>