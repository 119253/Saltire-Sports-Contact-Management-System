<?php
session_start();

if (!isset($_SESSION['status']))
{
    echo "<script>alert('You must login to access this part of the system')</script>";
	echo "<script>location.href='login.php'</script>";
}

elseif ($_SESSION['status'] == 'Admin')
{
    echo "<script>location.href='admin.php'</script>";
}

if ($_SESSION['status'] == 'Member')
{
    echo "<script>location.href='member.php'</script>";
}
?>

