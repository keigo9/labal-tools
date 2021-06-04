<?php 
    session_start();
    require("dbconnect.php");
    
    if(isset($_POST['zip_code2'])&&is_numeric($_POST['zip_code2'])){
        $value=$_POST['zip_code2'];
        $sql= 'select * from postalcode where code=?';
        $isMach =$db->prepare($sql);
        $isMach->execute(array($value));
        $isMach_true=$isMach->fetch();
        $isMach_true=convert_enc($isMach_true);
        $_SESSION["address2"]=$isMach_true["code"];
        $_SESSION["prefecture2"]=$isMach_true["prefecture"];
        $_SESSION["city2"]=$isMach_true["city"];
        $_SESSION["area2"]=$isMach_true["area"];
    }
    header("Location:index.php");
    exit();

    
    
?>
