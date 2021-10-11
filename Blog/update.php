<?php
  require_once __DIR__ . '/includes/auth_check.php';
  echo $_SERVER['REQUEST_METHOD'] . "<br> <hr>";
    require __DIR__ .'/vendor/autoload.php';
    $titleErr =$journalErr= '';
    if(isset($_GET["varUpdate"])){
        $idUpdate = $_GET["varUpdate"];
        // echo $idUpdate . "<br>";
        $connect = new MongoDB\Client("mongodb://localhost:27017");
        $db = $connect->mongophp->detail;
        $updateItem = array('_id'=>new MongoDB\BSON\ObjectId((string)$idUpdate));
        $condition= array('_id'=> $idUpdate);
        $cursor = $db->findOne($updateItem);
        $title =  $cursor["title"];
        $journal = $cursor['journal'];
        // echo $cursor["title"];
        

    }else{
        $connect = new MongoDB\Client("mongodb://localhost:27017");
        $cursor=['title'=>"", 'journal'=>""];
        $updateItem="";
        $idUpdate = "";
        $title =  "";
        $journal = "";
    }
  
    
  
    if ($_SERVER['REQUEST_METHOD']=='POST'){
      
      try{
            if (isset($_POST["submit"])){
             
            echo "successfully";
               if(empty($_POST['updatetitle'])){
                  $titleErr = "Title field is Required";
               }else{
                  $title = $_POST["updatetitle"];
               }
               if(empty($_POST['updatecontents'])){
                 $journalErr = "This Field is Required";
               }else{
                $journal = $_POST["updatecontents"];
               } 
            
            if ($title !='' && $journal !=''){
             
              $updateData = array('$set'=>array("title"=>$title,"journal"=>$journal));
              $db = $connect->mongophp->detail;
              $db->updateOne(array("_id"=>new MongoDB\BSON\ObjectId((string)$idUpdate)),$updateData);
            //  $db->updateOne($condition,$updateData);
              echo "successfully";
            }
            }
          
      }catch(Exception $e){
        echo "there is no value for update" . "<br>";
      }finally{
        echo "finalize here";
        if ($title && $journal){
            header('location:main.php');
          }
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
           <form id="updateForm" action="update.php?varUpdate=<?php echo $idUpdate?>"  method="post" enctype="multipart/form-data">
               <h3>UpdateTitle</h3>
               <textarea  type="text" name="updatetitle" id="title" rows="1" cols="30"> <?php echo $title?></textarea>
               <span class="error"> * <?php echo $titleErr ;?></span>
               <br>
               <h3>Update Paragraph</h3>
               <textarea  type="text" name="updatecontents"  cols="100%" rows="20" ><?php echo $journal ;?></textarea>
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
