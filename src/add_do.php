<?php 
    session_start();
    require("dbconnect.php");
    
    if(isset($_POST['last_name'])&&isset($_POST['first_name'])){
        $insert_sql= 'insert into allAddress set lastname=?,firstname=?,prefecture=?,city=?,area=?,areacode=?,areacode2=?,zipcode=?';
        $insert =$db->prepare($insert_sql);
        $insert->bindParam(1,$_POST["last_name"]);
        $insert->bindParam(2,$_POST["first_name"]);
        $insert->bindParam(3,$_POST["prefecture"]);
        $insert->bindParam(4,$_POST["city"]);
        $insert->bindParam(5,$_POST["area"]);
        $insert->bindParam(6,$_POST["are_code"]);
        $insert->bindParam(7,$_POST["area_code2"]);
        $insert->bindParam(8,$_POST["zip_code"]);
        $insert->execute();
        var_dump($insert);

        $show_sql= 'select * from allAddress where lastname=?';
        $isMach=$db->prepare($show_sql);
        $isMach->bindParam(1,$_POST["last_name"]);
        $isMach->execute();
        $isMach_true=$isMach->fetch();
        $isMach_true=convert_enc($isMach_true);
        var_dump($isMach_true);
        $_SESSION["lastName"]=$isMach_true["lastname"];
        $_SESSION["firstName"]=$isMach_true["firstname"];
        $_SESSION["areacode"]=$isMach_true["areacode"];
        $_SESSION["areacode2"]=$isMach_true["areacode2"];
        $_SESSION["message"]="登録完了";
    }else{
        $_SESSION["message"]="登録失敗";
    }

    var_dump($_POST["last_name"]);
    var_dump($_SESSION["lastName"]);
    //header("Location:index.php");
    exit();

    
    
?>
