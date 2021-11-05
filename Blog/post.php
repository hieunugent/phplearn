
<?php 
 require __DIR__ .'/vendor/autoload.php';
//  require_once __DIR__ . '/includes/auth_check.php';
require __DIR__. '/database.php';
 $title = $titleErr = '';
 $journal = $journalErr='';
 $image ="";
 use DevCoder\DotEnv;

       (new DotEnv(__DIR__ . '/.env'))->load();
    
       $connect = new MongoDB\Client("mongodb+srv://". getenv('USER').":". getenv('PASSWORD') ."@cluster0.wthhp.mongodb.net/myFirstDatabase?retryWrites=true&w=majority");
 
?>

<?php
echo $_SERVER['REQUEST_METHOD'] . "<br> <hr>";
if ($_SERVER['REQUEST_METHOD']=='POST'){
  
  try{
        if (isset($_POST["submit"])){
           if(empty($_POST['title'])){
              $titleErr = "Title field is Required";
           }else{
            $title = ucwords($_POST["title"]);
           }
           if(empty($_POST['contents'])){
             $journalErr = "This Field is Required";
           }else{
            $journal = $_POST["contents"];
           } 
          if ($title !='' && $journal!=''){
          
          $date = new DateTime("now", new DateTimeZone('America/Los_Angeles'));  
          $value =  $date->getTimestamp(). "000";
          $db = $connect->mongophp->detail;
          $result = $db->insertOne([
            "title"=>$title,
            "journal"=>$journal,
            "cover"=> new MongoDB\BSON\Binary(file_get_contents($_FILES["fileToUpload"]["size"] > 0?
              $_FILES["fileToUpload"]["tmp_name"]:"https://picsum.photos/200/300"), MongoDB\BSON\Binary::TYPE_GENERIC),
            "timestamp"=> new MongoDB\BSON\UTCDateTime($value),
          ]);
          echo "successfully";
        }
        }
  }catch(Exception $e){
    echo " there is an error";
  }
}
// $filename = $_POST["title"] . ".txt";

// $newPost = fopen($_POST["title"] . ".txt", "w+") or die("Unable to open file!");
// fwrite($newPost, $contents);
// fclose($newPost);
// $newPost = fopen($_POST["title"] . ".txt", "r+") or die("Unable to open file!");
// fclose($newPost);

if (isset($_POST['fileToUpload'])){
// $target_dir = "uploads/";

// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// $outputvalue="";
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $outputvalue= "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $outputvalue= "File is not an image.";
    $uploadOk = 0;
  }
}

// // Check if file already exists
// if (file_exists($target_file)) {
//   $outputvalue= "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $outputvalue= "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   $outputvalue= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $outputvalue= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  //   $outputvalue= "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  // } else {
  //   $outputvalue= "Sorry, there was an error uploading your file.";
  // }

  
}
}
if ($title && $journal){
  header('location:main.php');
}
?>

<html>
    <head>
    <script>
        
    </script>
    <style>
        .error{
          color: #FF0000;
        }
    </style>
     <link rel="stylesheet" href="views/post.css">
    </head>
   <body class="page">
       <div>
           <form id="postForm" action="post.php"  method="post" enctype="multipart/form-data">
               <h3>Title</h3>
               <textarea class="contentInput" type="text" name="title" id="title" cols="90" rows="1" > </textarea>
               <span class="error"> * <?php echo $titleErr ;?></span>
               <br>
               <h3>Post Paragraph</h3>
               <textarea  class="contentInput"type="text" name="contents"  cols="90" rows="20"></textarea>
               <span class="error">* <?php echo $journalErr;?></span>
               <br>
            Select image to upload:
               <input class="uploadFIle" type="file" name="fileToUpload" id="fileToUpload" >
               <br>
               <input class="submitForm" type="submit" name="submit"  value="submit" >
           </form>
           <span>
           <form action="main.php">
              <input  class="cancelForm" type="submit" name="Back" value="cancel" action="main.php">
           </form>
           </span>
         

       </div>
   </body>
</html>