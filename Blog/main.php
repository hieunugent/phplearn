<?php
  require __DIR__ .'/vendor/autoload.php';
  
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
       <?php
       $connect = new MongoDB\Client("mongodb://localhost:27017");
       $db=$connect->mongophp->detail;
       $cursor = $db->find();
       foreach ($cursor as $obj){ ?>
          <div>
        <h3><?php echo $obj["_id"] ?></h3>
        <h3><?php echo $obj["title"] ?></h3>
        <p> <?php echo $obj["journal"]?> </p>
        
        
          </div>
          
       <?php }?>
        
   </body>
</html>
