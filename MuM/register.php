<?PHP

$uname = "";
$pword = "";
$email = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require 'configure.php';

  $uname = $_POST['username'];
  $pword = $_POST['password'];
  $email = $_POST['email'];

  $database = "mum";

  $db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

  if ($db_found) {    
    $SQL = $db_found->prepare('SELECT * FROM users WHERE Username = ?');
    $SQL->bind_param('s', $uname);
    $SQL->execute();
    $result = $SQL->get_result();
    print "found";

    if ($result->num_rows > 0) {
      $errorMessage = "Username already taken.";
    }
    else {
      $hash = md5( rand(0,1000) );
      $phash = password_hash($pword, PASSWORD_DEFAULT);
      $SQL = $db_found->prepare("INSERT INTO users (Username, Password, Email, Hash) VALUES (?, ?, ?, $hash)");
      $SQL->bind_param('ss', $uname, $phash);
      $SQL->execute();

      header ("Location: login.php");
    }
  }
  else {
    $errorMessage = "Database Not Found";
  }
}
?>

<html>
<head>

  <link rel="stylesheet" href="register_style.css">

</head>

<body>
	<div class="topbar">

			<div class="searchbox">
				<input type="text" placeholder="Search..." style="font-family:'Montserrat'; font-weight:normal;font-size:20px">
				<img src="Content\Images\Icons\Search Icon.png" class="search_icon" width="25" height="25">
			</div>

			<div class="nowplaying">
				<p style="font-family:'Nugget Medium';font-weight:normal;font-size:23px">No music is currently playing.</p>
			</div>

	</div>

	<div class="sidebar">
		<a class="logo_link" href="index.php">
			<img src="Content\Logo\Logo5.png" class="logo" alt="Logo" width="140" height="40">
		</a>

		<a class="sidebar-menu" href="#" style="font-family:'Nugget Medium';font-weight:normal;font-size:23px">Profile</a>
		<a class="sidebar-menu" href="#" style="font-family:'Nugget Medium';font-weight:normal;font-size:23px">Likes</a>
		<a class="sidebar-menu" href="#" style="font-family:'Nugget Medium';font-weight:normal;font-size:23px">Explore</a>
		<a class="sidebar-menu" href="#" style="font-family:'Nugget Medium';font-weight:normal;font-size:23px">Genres</a>
		<div class="bottom" >Copyright @2020</div>
	</div>

  <div>

    <?php

      if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password']) AND isset($_POST['email']) && !empty($_POST['email']))
      {
        $name = mysql_escape_string($_POST['username']);
        $email = mysql_escape_string($_POST['email']);
      }

      if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
      {
        $msg = 'The email you have entered is invalid, please try again.';
      }

      else
      {
        $msg = 'Your account has been made, please verify it by clicking the activation link that has been sent to your email.';
      }

    ?>

    <?php 
    if(isset($msg))
    {
        echo '<div class="statusmsg">'.$msg.'</div>';
    } 
    ?>

  	<form name="userRegistration" class="regBox" method="post" action="">
      <h1 style="font-family:'Montserrat'; font-weight:normal;font-size:30px">Register</h1>

        <div class="block">
          <input type="text" name="username" placeholder="Username" value="<?PHP print $uname;?>">
          <label style="font-family:'Montserrat'; font-weight:normal;font-size:20px; color:#ffffff"><?PHP print $errorMessage;?></label>
        </div>

        <div>
          <input type="text" name="email" placeholder="E-mail" value="<?PHP print $email;?>">
        </div>

        <div>
          <input id="password" type="password" name="password" placeholder="Password" value="<?PHP print $pword;?>" onkeyup='check();'>
        </div>

        <div>
          <input id="confirm_password" type="password" name="" placeholder="Repeat password" onkeyup='check();'>
        </div>

        <span id='message'></span>

      <input type="submit" name="" value="Register">

      <div>
        <h1 style="font-family:'Arial'; font-weight:normal;font-size:20px">Already have an account?</h1>
        <a href="login.php" style="font-family:'Nugget Medium';font-weight:normal;font-size:20px; color: #ffffff; text-decoration: none;">Log in.</a>
      </div>
	 </form>

  </div>

	</body>
</html>

<script>

  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = '';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'The passwords don\'t match.';
  }
}

</script>