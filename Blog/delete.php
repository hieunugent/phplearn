<?php
   echo $_SERVER['REQUEST_METHOD'] . "<br> <hr>";
       try{
            $iddelete = $_GET["varname"];
            echo $iddelete;
            echo  "<hr>"; 
            require __DIR__ .'/vendor/autoload.php';
            $connect = new MongoDB\Client("mongodb://localhost:27017");
            // echo "connect to database successfull <br>";
            $db=$connect->mongophp;
            // echo "Database mongophp selected <br>";
            $collections=$db->detail;
            // echo "collection selected successfull <br>";
            $result = $collections->deleteOne(['_id' => new MongoDB\BSON\ObjectId($iddelete)]);
            // echo "SUCCESS  Delete  <br>" ;
            printf("Delele % d document(s) \n", $result->getDeletedCount());
        }catch(Exception $e){
            echo "Error when Delete" . $e;  }
  
    
?>

<hr>
<p><a href="main.php">back to the main page</a></p>



