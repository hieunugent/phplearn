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
      .logoimage{
        width: 40px;
        height: 40px;
        border-radius:2rem
      }
    
    </style>
     <link rel="stylesheet" href="views/post.css">
    </head>
   <body class="page">
       <div class="navbar_section">
         <div class="navTilte">
             <h3 >Home Page</h3>
         </div>
         <div class="navLogo" >
         <img class="logoimage" src="/uploads/blog.jpg" alt="logo">
         </div>
        
         <a class="navBtnA" href="post.php" >ADD</a>
         
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
        <h3 class="titleOutput"><?php echo $obj["title"] ?></h3>
        <div>
         
         <p class="journalOutput">  
           <?php
            if ($obj["cover"]!=""){ ?>
             <img class="postimage" src="data:jpeg;base64,<?=base64_encode($obj->cover->getData())?>"alt="postimage" >
           <?php }
           else{ ?>
              <img class="postimage" src="https://picsum.photos/200/300" alt="postimage" >
          <?php  } 
           ?>
          
           
           <?php echo $obj["journal"]?>
          
          </p>
       </div> 
      
        <div class="button_group">
        <a class="myBtn" href="update.php?varUpdate=<?php echo $obj["_id"]?>"><button class="myBtn">Edit </button></a>
        <!-- <a class="myBtn" href="delete.php?varname=<?php echo $obj["_id"] ?>" > <Button class="myBtn">Delete</Button></a> -->
        <a class="myBtn" href="main.php?vardelete=<?php echo $obj["_id"] ?>"><button class="myBtn">Delete</button></a>
        <a class="myBtn" href="view.php?valueId=<?php echo $obj["_id"] ?>"> <button class="myBtn">View</button></a>
        
        </div>
        </div>
       <?php

      
      }?>
     

         </div>
   </body>
</html>
