<!DOCTYPE html>
<?php

require __DIR__. '/database.php';
// echo $_SERVER['REQUEST_METHOD'] . "<br> <hr>";
require __DIR__ .'/vendor/autoload.php';
// require_once __DIR__ . '/includes/auth_check.php';
use DevCoder\DotEnv;

       (new DotEnv(__DIR__ . '/.env'))->load();
    
       $connect = new MongoDB\Client("mongodb+srv://". getenv('USER').":". getenv('PASSWORD') ."@cluster0.wthhp.mongodb.net/myFirstDatabase?retryWrites=true&w=majority");
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
    <link rel="stylesheet" href="views/view.css">
    <style>
      .myBtn{
        text-decoration:none;
      }
      .logoimage{
        width: 40px;
        height: 40px;
        border-radius:2rem
      }
    
    </style>
</head>
<body class="viewpage">
<div class="view_navbar_section">
              <div class="view_navTilte">
              <a href="main.php" class="myBtn">HOME PAGE</a>
              </div>
              <div class="view_navLogo" >
                    <img class="logoimage" src="/uploads/blog.jpg" alt="logo">
              </div>
       </div>

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
    
    <a href="delete.php?varname=<?php echo $idUpdate ?>" > <Button class="myBtn">Delete</Button> </a>
    
</body>
</html>