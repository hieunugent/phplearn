
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
           <form id="postForm" action="post.php"  method="post" enctype="multipart/form-data">
               <h3>Title</h3>
               <input type="text" name="title" id="title" value="<?php if (isset($title) && $success == '') {echo $title;} ?>">
               <br>
               <h3>Post Paragraph</h3>
               <textarea type="text" name="contents"  cols="100%" rows="20"></textarea>
               <br>
            Select image to upload:
               <input type="file" name="fileToUpload" id="fileToUpload" value=null>
            <br>
               <input type="submit" name="submit"  value="submit" >
           </form>
       </div>
   </body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
  try{
        $connect = new MongoDB\Client("mongodb://localhost:27017");

        if (isset($_POST["submit"])){
            $title = $_POST["title"];
            $journal = $_POST["contents"];
            
            if($title !=''){
                $success = 'success';
         }
        else{
          $success='';
        }
        $db = $connect->mongophp->detail;
        $result = $db->insertOne([
          "title"=>$title,
          "journal"=>$journal,
        ]);
        echo "successfully";
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

if ($_POST['fileToUpload']){
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$outputvalue="";
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

// Check if file already exists
if (file_exists($target_file)) {
  $outputvalue= "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $outputvalue= "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $outputvalue= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $outputvalue= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $outputvalue= "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    $outputvalue= "Sorry, there was an error uploading your file.";
  }
}
}

?>