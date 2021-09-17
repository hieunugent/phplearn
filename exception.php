<?php
function divide($dividend, $divisor){
    if ($divisor == 0){
        throw new Exception("can not devide by ZERO");
    }
    return $dividend/$divisor;
    
}
echo divide(100,10) . "<br>"; 

try{
    echo divide(100,0);

}catch(Exception $e){
    echo " Unable to divide. <br>";
}

?>