<?php
  echo $_SERVER['REQUEST_METHOD'] . "<br> <hr>";
    require __DIR__ .'/vendor/autoload.php';
    $idUpdate = $_GET["varUpdate"];
    echo $idUpdate . "<br>";
    $connect = new MongoDB\Client("mongodb://localhost:27017");
    $db = $connect->mongophp->detail;
    $updateItem = array('_id'=>new MongoDB\BSON\ObjectId($idUpdate));
    $cursor = $db->findOne($updateItem);
    $title = $cursor["title"];
    $journal = $cursor['journal'];
    // echo $cursor["title"];
    $titleErr =$journalErr= '';

  
    if ($_SERVER['REQUEST_METHOD']=='POST'){
      
      try{
            if (isset($_POST["submit"])){
               if(empty($_POST['title'])){
                  $titleErr = "Title field is Required";
               }else{
                $title = $_POST["title"];
               }
               if(empty($_POST['contents'])){
                 $journalErr = "This Field is Required";
               }else{
                $journal = $_POST["contents"];
               } 
            
            if ($title !='' && $journal!=''){
              $db = $connect->mongophp->detail;
              $result = $db->update($updateItem, [
                "title"=>$title,
                "journal"=>$journal,
              ]);
              echo "successfully";
            }
            }
      }catch(Exception $e){
        echo " there is an error";
      }
    }

?>

<html>
    <head>
    <script>
        .error{
          color: #FF0000;
        }
    </script>
    </head>
   <body>
       <div>
           <h2>YOUR OLD POST BLOG</h2>
           <h3><?php echo $cursor["title"] ?></h3>
           <p> <?php echo $cursor['journal']?></p>
       </div>



       <div>
           <h2>EDIT YOUR POST BLOG HERE</h2>
           <form id="postForm" action="post.php"  method="post" enctype="multipart/form-data">
               <h3>Title</h3>
               <input  type="text" name="title" id="title" value=<?php echo $title?>>
               <span class="error"> * <?php echo $titleErr ;?></span>
               <br>
               <h3>Post Paragraph</h3>
               <textarea  type="text" name="contents"  cols="100%" rows="20" ><?php echo $journal ;?></textarea>
               <span class="error">* <?php echo $journalErr;?></span>
               <br>
            Select image to upload:
               <input type="file" name="fileToUpload" id="fileToUpload" value=null>
               <br>
               <input type="submit" name="submit"  value="submit" >
           </form>
           <span>
           <form action="main.php">
              <input type="submit" name="Back" value="cancel" action="main.php">
           </form>
           </span>
         

       </div>
   </body>
</html>
