<?php 
    session_start();
    require("dbconnect.php");
    
    if(isset($_POST['zip_code'])&&is_numeric($_POST['zip_code'])){
        $value=$_POST['zip_code'];
        $sql= 'select * from postalcode where code=?';
        $isMach =$db->prepare($sql);
        $isMach->execute(array($value));
        $isMach_true=$isMach->fetch();
        $isMach_true=convert_enc($isMach_true);
        $_SESSION["address"]=$isMach_true["code"];
        $_SESSION["prefecture"]=$isMach_true["prefecture"];
        $_SESSION["city"]=$isMach_true["city"];
        $_SESSION["area"]=$isMach_true["area"];
    }
    header("Location:index.php");
    exit();

    
    
?>
