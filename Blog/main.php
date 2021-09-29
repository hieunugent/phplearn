<?php
  require __DIR__ .'/vendor/autoload.php';
  require __DIR__ .'/delete.php';
  session_start();
  $_SESSION['valueDelete'] = '';
  $resultTest= "False";
?>
<html>
    <head>
    <script>
    </script>
    </head>
   <body>
       <div>
           <form action="" >
           <input formaction="post.php" type="submit" name="addPost" value="Add new post" >
           </form>
       </div>
       <div class="mainpage">
       <?php
       $connect = new MongoDB\Client("mongodb://localhost:27017");
       $db=$connect->mongophp->detail;
       $cursor = $db->find();
     
       
      
       foreach ($cursor as $obj){ ?>
        <div >
        <h3  name="itemId"><?php echo $obj["_id"] ?></h3>
        <h3><?php echo $obj["title"] ?></h3>
        <p> <?php echo $obj["journal"]?></p>
        
        <a href="delete.php?varname=<?php echo $obj["_id"] ?>" > 
        <Button>
        Delete
        </Button> </a>
        <
        </div>
          
       <?php
      
      
      }?>
         </div>
   </body>
</html>
