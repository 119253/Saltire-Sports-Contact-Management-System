<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<HTML>
<head>
	<title>Test Signon - v0.1</title>
</head>

<body>
	<h1>Test Signon - v0.1</h1>

<?php 

$DEFAULT_USERID   = 'steve';
$DEFAULT_PASSWORD = 'mypassword';

$userid   = $_POST['userid'];
$password = $_POST['password'];

// make sure default user is present
if (!isset($_SESSION['users']))
{
	$_SESSION['users'] = $DEFAULT_USERID . '~' . $DEFAULT_PASSWORD;
	echo('session was not set - default userid has been added<br><br>');	
}

// get list of userids and passwords into an array
$users   = explode('#', $_SESSION['users']); 	// $users is now an array, each element is 'useridn~passwordn'
$newUser = $userid . '~' . $password;			// $newUser = userid~password
$status  = "loggedOut";							// default status is logged out

echo('<br>  users : ' . $users); 		// debug
echo('<br>newUser : ' . $newUser); 		// debug

// go though each element in the array
foreach($users as $user) { 
	echo('<br>next user : ' . $user); 	// debug
	if ($user == $newUser) {					// see if the userid~password match
		echo('<br>Found it!');  		// debug
		$status = "loggedIn";					// if so, set them as loggen in
	}
}
if ($status != 'loggedIn') {					// if they are not logged in
	echo 'userid and/or password invalid<br>';	// issue message
}

// see if userid and password client passed is in the list of valid users
/*
if (($userid == $DEFAULT_USERID)  && ($password == $DEFAULT_PASSWORD)) {
	$status = "loggedIn";
} else {
	echo 'userid and/or password invalid<br>';
	$status = "loggedOut";
}
*/

$_SESSION["status"] = $status;
echo '<br><br>Current logged in status is : ' . $status;

?>

<form name='form1' id='form1' action="index.html" method="get">
	Home : <input type="submit"  value="Home">
</form>

</body>
</HTML>