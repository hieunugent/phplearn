<?php
  require __DIR__ .'/vendor/autoload.php';
  session_start();
  function php_delete_func(){
    echo "True";
  }
  $resultTest= "False";

?>
<html>
    <head>
    <script>
      function test(){
        document.write()
      });
      }
     
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
        <div id="$obj["id"]" >
        <h3  name="itemId"><?php echo $obj["_id"] ?></h3>
        <h3><?php echo $obj["title"] ?></h3>
        <p> <?php echo $obj["journal"]?></p>
        <form action="main.php"> 
        <button  onclick="test()" > 
           button
        </button>

        </form>
       
        </div>
          
       <?php
      
      
      }?>
         </div>
   </body>
</html>
