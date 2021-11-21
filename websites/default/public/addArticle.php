<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styles.css"/>
    <title>Add Article</title>
</head>
<body>
<form action="addArticle.php" method="GET">
		<p>Add Article:</p>
		<label>Article Title</label> <input type="text" name="title"/>
		<label>catagory 1</label> <input type="checkbox" name="catagory1"/>
        <label>catagory 2</label> <input type="checkbox" name="catagory2"/>
        <label>catagory 3</label> <input type="checkbox" name="catagory3"/>
		<label>content</label> <textarea name="content"></textarea>

	    <input type="submit" name="submit" value="Submit" />
	</form>
    <?php
        $server = 'mysql';
        $username = 'student';
        $password = 'student';
        $schema = 'Assignment1';
    
        $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

        if(isset($_GET['catagory1'])){
            $cat1 = $pdo -> prepare('INSERT INTO article (content, title, catagoryid, publishdate) VALUES (:content, :title, :catid, :date)');

            $cat1Info = [
                'content' => $_GET['content'],
                'title' => $_GET['title'],
                'catid' => '1',
                'date' => date('Y/m/d')
            ];

            $cat1 -> execute($cat1Info);
        }

        if(isset($_GET['catagory2'])){
            $cat2 = $pdo -> prepare('INSERT INTO article (content, title, catagoryid, publishdate) VALUES (:content, :title, :catid, :date)');

            $cat2Info = [
                'content' => $_GET['content'],
                'title' => $_GET['title'],
                'catid' => '2',
                'date' => date('Y/m/d')
            ];

            $cat2 -> execute($cat2Info);
        }

        if(isset($_GET['catagory3'])){
            $cat3 = $pdo -> prepare('INSERT INTO article (content, title, catagoryid, publishdate) VALUES (:content, :title, :catid, :date)');

            $cat3Info = [
                'content' => $_GET['content'],
                'title' => $_GET['title'],
                'catid' => '3',
                'date' => date('Y/m/d')
            ];

            $cat3 -> execute($cat3Info);
        }
    ?>
</body>
</html>