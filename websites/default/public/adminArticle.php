<?php
    $server = 'mysql';
	$username = 'student';
	$password = 'student';
	$schema = 'Assignment1';

	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

    $articles = $pdo -> prepare('SELECT * FROM article');

    $articles -> execute();

    echo '<table border = "1">
        <tr> 
            <th>Title</th>
            <th>catagory</th>
            <th>content</th>
            <th>Publish Date</th>
        </tr>';
    
    while($articleInfo = $articles -> fetch(PDO::FETCH_COLUMN)){
        echo '<tr>';
        echo '<td>' . $articleInfo . '</td>';
        echo '</tr>';
    }
?>