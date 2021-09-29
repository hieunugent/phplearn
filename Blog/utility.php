
<?php
  function deleteOneElement($idselected){
    require __DIR__ .'/vendor/autoload.php';
    $connect = new MongoDB\Client("mongodb://localhost:27017");
    // echo "connect to database successfull <br>";
    $db=$connect->mongophp;
    // echo "Database mongophp selected <br>";
    $collections=$db->detail;
    // echo "collection selected successfull <br>";
    $result = $collections->deleteOne(['_id' => new MongoDB\BSON\ObjectId($idselected)]);
    echo "SUCCESS  Delete  <br>" ;
    // printf("Delele % d document(s) \n", $result->getDeletedCount());
}
?>
