<!DOCTYPE html>
<?php

// echo $_SERVER['REQUEST_METHOD'] . "<br> <hr>";
require __DIR__ .'/vendor/autoload.php';
$connect = new MongoDB\Client("mongodb://localhost:27017");
$db=$connect->mongophp->detail;
if(isset($_GET["valueId"])){
$idUpdate = $_GET["valueId"];
// echo $idUpdate . "<br>";
$updateItem = array('_id'=>new MongoDB\BSON\ObjectId((string)$idUpdate));
$cursor = $db->findOne($updateItem);
$title =  $cursor["title"];
$journal = $cursor['journal'];
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="views/post.css">
</head>
<body class="page">
    <div >
    <h3 class="blogTitle"><?php echo $cursor['title'] ?></h3>
    <p class="blogJournal"><?php echo $cursor['journal']?></p>
    </div>
    <hr>
    <a href="main.php"><button class="myBtn">HOME PAGE</button></a>
    <a class="myBtn" href="delete.php?varname=<?php echo $idUpdate ?>" > <Button class="myBtn">Delete</Button> </a>
    
</body>
</html>