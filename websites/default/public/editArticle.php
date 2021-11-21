<?php
    $server = 'mysql';
	$username = 'student';
	$password = 'student';
	$schema = 'Assignment1';

	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

    $search = $pdo -> prepare('SELECT * FROM users WHERE title = :title');
            $searchInfo = [
                'title' => $_POST['title']
            ]
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styles.css"/>
    <title>Add Article</title>
</head>
<body>
<form action="editArticle.php" method="POST">
		<p>Add Article:</p>
		<label>Article Title</label> <input type="text" name="title"/>
        <input type="submit" name="search" value="Search" />
		<?php
            $article = $search -> fetch();

            echo '<label>content</label>';
            echo $article['content'];
            echo'<textarea name="content"></textarea>';
        ?>

	    <input type="submit" name="submit" value="Submit" />
	</form>
    <?php
        if(isset($_POST['search'])){
            $search -> execute($searchInfo);
        }
    ?>