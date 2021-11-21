<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css"/>
    <title>SignUp</title>
</head>
<body>
<form action= "signup.php" method= "GET">
	<p>Sign Up:</p>
	<label>User Name</label> <input type="text" placeholder = "test" name="userName"/>
    <label>Email Address</label> <input type="text" placeholder = "test" name="email"/>
	<label>Password</label> <input type="text" placeholder = "test" name="password"/>

	<input type="submit" name="submit" value="Submit" />
</form>

<?php
	$server = 'mysql';
	$username = 'student';
	$password = 'student';
	$schema = 'Assignment1';

	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

	$userName = $_GET['userName'];
	$email = $_GET['email'];
	$password= $_GET['password'];

	$stmt = $pdo -> prepare('INSERT INTO users (userName, email, password, level) VALUES (:userName, :email, :password, :user)');

	$input = [
		'userName' => $userName,
		'email' => $email,
		'password' => $password,
		'user' => 'user'
	];
	$stmt -> execute($input);
?>

</body>
</html>