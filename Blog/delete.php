<?php
require __DIR__ .'/vendor/autoload.php';
require_once __DIR__. '/database.php';


   echo $_SERVER['REQUEST_METHOD'] . "<br> <hr>";
       try{
            $iddelete = $_GET["varname"];
            echo $iddelete;
            echo  "<hr>"; 
           
            

            $connect = "";
            if (getenv('DATABASE_URL')){
             $connect = new MongoDB\Client(getenv('DATABASE_URL'));
            }else{
             $connect = new MongoDB\Client("mongodb+srv://". getenv('USER').":". getenv('PASSWORD') ."@cluster0.wthhp.mongodb.net/myFirstDatabase?retryWrites=true&w=majority");
            }
            // $connect = new MongoDB\Client("mongodb+srv://". getenv('USER').":". getenv('PASSWORD') ."@cluster0.wthhp.mongodb.net/myFirstDatabase?retryWrites=true&w=majority");
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



