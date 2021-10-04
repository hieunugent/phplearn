<?php
  require __DIR__ .'/vendor/autoload.php';
  require __DIR__ .'/utility.php';
?>
<html>
    <head>
    <script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
     }
    
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
     <link rel="stylesheet" href="views/main.css">
    </head>
   <body class="page">
       <div class="main_navbar_section">
              <div class="main_navTilte">
                  <h3 >My Blog</h3>
              </div>
              <div class="main_navLogo" >
                    <img class="logoimage" src="/uploads/blog.jpg" alt="logo">
              </div>
              
                  <a class="main_navBtnA" href="post.php" >ADD</a>    
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
        <div class="main_displayItem">
        <!-- <h3><?php echo $obj["_id"] ?></h3> -->
            <div class="main_topdisplayItem">
                  <h3 class="main_titleOutput"><?php echo $obj["title"] ?></h3>
                  <div class="main_dropdown">
                      <button onclick="myFunction()" class='main_dropBtn'> ⋮ </button>
                      <div id="myDropdown" class="main_dropdown-content">
                            <a  href="update.php?varUpdate=<?php echo $obj["_id"]?>">Edit </a>
                            <a  href="main.php?vardelete=<?php echo $obj["_id"] ?>">Delete</a>
                            <a  href="view.php?valueId=<?php echo $obj["_id"] ?>"> View</a>
                      </div>
                 </div>
            </div>
           
            <div class="main_journalOutput">   
                <p >  
                      
                  <?php echo $obj["journal"]?>
                  
                </p>
                <?php
                    if ($obj["cover"]!=""){ ?>
                    <img class="main_postimage" src="data:jpeg;base64,<?=base64_encode($obj->cover->getData())?>"alt="postimage" >
                  <?php }
                  else{ ?>
                      <img class="main_postimage" src="https://picsum.photos/200/300" alt="postimage" >
                      <?php  } 
                  ?>    
             </div> 
      
        
        </div>
          <?php }?>
     

      </div>
   </body>
</html>
