<?php
require_once 'classes/user.php';

$user = new User();

// Activeer de session
session_start();

// Indien Logout geklikt
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    $user->Logout();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="script" href="assets/js/home.js">
</head>
<body>
<!--<form id="login">-->
<!--    <p>Inlog</p>-->
<!--    <input type="text" name="username">-->
<!--    <input type="password" name="password">-->
<!--    <input type="submit">-->
<!--</form>-->
<!--<form id="register">-->
<!--    <p>Register</p>-->
<!--    <input type="text" name="username">-->
<!--    <input type="password" name="password">-->
<!--    <input type="submit">-->
<!--</form>-->

<h2>Home Page</h2>
<?php
	if(!$user->IsLoggedin()){
        echo "<p>Je bent niet ingelogd klik hier om in te loggen.</p>";
        echo '<a id="login" href="inlog_form.php">Login</a>';
	}else{
		// select userdata from database
		$user->GetUser($user->username);

		// Print userdata
		echo "<h2>Het spel kan beginnen</h2>";
		echo "Je bent ingelogd met:<br/>";
		$user->ShowUser();
		echo "<br><br>";
		echo '<a href = "?logout=true">Logout</a>';
	};
    ?>
</body>
</html>
