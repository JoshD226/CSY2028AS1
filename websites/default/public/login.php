<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css"/>
    <title>SignUp</title>
</head>
<body>
<form action= "index.php" method= "POST">
	<p>Log In:</p>
	<label>User Name</label> <input type="text" placeholder = "test"  name="userName"/>
	<label>Password</label> <input type="text" placeholder = "test" name="password"/>

	<input type = "submit" name = "submit" value = "Submit" />
</form>

<?php
	$server = 'mysql';
	$username = 'student';
	$password = 'student';
	$schema = 'Assignment1';

	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

	

	$user = $pdo -> prepare('SELECT * FROM users WHERE userName = :userName AND password = :password AND level = :user');

	$userInfo = [
		'userName' => $_POST['userName'],
		'password' => $_POST['password'],
		'user' => 'user'
	];
	$user -> execute($userInfo);

	$admin = $pdo -> prepare('SELECT * FROM users WHERE userName = :userName AND password = :password AND level = :admin');

	$adminInfo = [
		'userName' => $_POST['userName'],
		'password' => $_POST['password'],
		'admin' => 'admin'
	];
	$admin -> execute($adminInfo);

	if ($admin -> rowCount() > 0) {
		$_SESSION['admin'] = true;
		echo '<p>admin</p>';
	   }

	   if ($user -> rowCount() > 0){
		   $_SESSION['user'] = true;
		   echo '<p>user</p>';
	   }

	   else {
		echo '<p>username or password is incorrect</p>';
	   }
?>

</body>
</html>