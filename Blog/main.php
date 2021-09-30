<?php
  require __DIR__ .'/vendor/autoload.php';
  require __DIR__ .'/utility.php';
?>
<html>
    <head>
    <script>
    
    
    </script>
    <style>
      .myBtn{
        text-decoration:none;
      }
      .journalOutput{
        
        width: 50%;
        overflow:hidden;
        white-space:nowrap;
        text-overflow: ellipsis;
      }
     
    </style>
     <link rel="stylesheet" href="views/post.css">
    </head>
   <body class="page">
       <div class="submitBtn">
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
         header("location:main.php");
       }
      
       foreach ($cursor as $obj){ ?>
        <div class="displayItem">
        <!-- <h3><?php echo $obj["_id"] ?></h3> -->
        <h3><?php echo $obj["title"] ?></h3>
        <p class="journalOutput"> <?php echo $obj["journal"]?></p>
        <a class="myBtn" href="update.php?varUpdate=<?php echo $obj["_id"]?>"><button class="myBtn">Edit </button></a>
        <a class="myBtn" href="delete.php?varname=<?php echo $obj["_id"] ?>" > <Button class="myBtn">Delete</Button></a>
        <a class="myBtn" href="main.php?vardelete=<?php echo $obj["_id"] ?>"><button class="myBtn">Delete On Main</button></a>
        <a class="myBtn" href="view.php?valueId=<?php echo $obj["_id"] ?>"> <button class="myBtn">View</button></a>
        </div>
       <?php

      
      }?>
     

         </div>
   </body>
</html>
