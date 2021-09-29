<?php
echo $_SERVER['REQUEST_METHOD'] . "<br> <hr>";
  require __DIR__ .'/vendor/autoload.php';
  require __DIR__ .'/utility.php';
?>
<html>
    <head>
    <script>
    
    </script>
    </head>
   <body>
       <div>
           <form action="post.php" >
           <input type="submit" name="addPost" value="Add" >
           </form>
       </div>
       <div class="mainpage">
       <?php
       $connect = new MongoDB\Client("mongodb://localhost:27017");
       $db=$connect->mongophp->detail;
       $cursor = $db->find();
     
       if(isset($_GET["vardelete"])){
         deleteOneElement($_GET["vardelete"]);
        
       }
      
       foreach ($cursor as $obj){ ?>
        <div >
        <h3  name="itemId"><?php echo $obj["_id"] ?></h3>
        <h3><?php echo $obj["title"] ?></h3>
        <p> <?php echo $obj["journal"]?></p>
        <a href="delete.php?varname=<?php echo $obj["_id"] ?>" > <Button>Delete</Button> </a>

        <a href="main.php?vardelete=<?php echo $obj["_id"] ?>"><button>Delete On Main</button></a>
        </div>
          
     
       <?php
      
      
      }?>
     
          
      
      
      
   



         </div>
   </body>
</html>
