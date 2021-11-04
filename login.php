
<!DOCTYPE html>
<HTML>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saltire Sports</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
  margin:  auto;
  padding: auto;
  width: 50%;
  position: absolute;
  left: 50%;
  top: 50%;
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
      </ul>
    </div>
  </nav>


<script>
function getScreenDetails() {
  document.forms['form1']['width'].value = screen.width;
  document.forms['form1']['height'].value = screen.height;
  document.forms['form1']['browser'].value = getBrowserName();
}

var enterDate = new Date();

function durationCalc()
{
  return (new Date() - enterDate) / 1000;
}

function getDuration(){
    document.form1.time.value = durationCalc();
    document.forms["form1"].submit();
}

function getBrowserName() { 
    if((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1 ) {
        return 'Opera';
    } else if(navigator.userAgent.indexOf("Chrome") != -1 ) {
        return 'Chrome';
    } else if(navigator.userAgent.indexOf("Safari") != -1) {
        return 'Safari';
    } else if(navigator.userAgent.indexOf("Firefox") != -1 ){
        return 'Firefox';
    } else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) {
        return 'Internet Explorer';
    } else {
        return 'Not sure!';
    }
}

function showpwd() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<body onload="getScreenDetails();">

<form name='form1' id='form1' action="welcome.php" method="post">

  <input type="hidden" id="width" name="width" value="0">
  <input type="hidden" id="height" name="height" value="0">
  <input type="hidden" id="time" name="time" value="0">
  <input type="hidden" id="browser" name="browser" value="0">

    <div class="container" id="1">
   

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname">

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pwd" id="pwd">
      <input type="checkbox" onclick="showpwd()">

      <br>
        
        <button type="submit" onclick="getDuration()" class="signupbtn" formaction="welcome.php">Login</button>

    <button type="sumbit" class="cancelbtn1" formaction="logout.php">Log Out</button>




  </div>
  </form>



  <footer>
    <p>&copy; Copyright 2021 Fouad Rabah</p>
  </footer>


</body>
</html>


