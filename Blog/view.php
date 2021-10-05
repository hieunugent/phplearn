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
<body class="viewpage">
    <div class="viewcontent" >
    <h3 class="viewTitle"><?php echo $cursor['title'] ?></h3>
    <p class="viewJournal">
         <?php
            if ($cursor["cover"]!=""){ ?>
             <img class="viewimage" src="data:jpeg;base64,<?=base64_encode($cursor->cover->getData())?>" alt="postimage" >
           <?php }
           else{ ?>
              <img class="viewimage" src="https://picsum.photos/200" alt="postimage" >
          <?php  } 
           ?>
         
         <?php echo $cursor['journal']?></p>
    </div>
    <hr>
    <a href="main.php"><button class="myBtn">HOME PAGE</button></a>
    <a href="delete.php?varname=<?php echo $idUpdate ?>" > <Button class="myBtn">Delete</Button> </a>
    
</body>
</html>