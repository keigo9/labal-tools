<?php
    session_start();
    require("dbconnect.php");
   
    $session_address=htmlspecialchars($_SESSION['address'],ENT_QUOTES);
    $session_prefecture=htmlspecialchars($_SESSION["prefecture"],ENT_QUOTES);
    $session_city=htmlspecialchars($_SESSION["city"],ENT_QUOTES);
    $session_area=htmlspecialchars($_SESSION["area"],ENT_QUOTES);
    $session_address2=htmlspecialchars($_SESSION['address2'],ENT_QUOTES);
    $session_prefecture2=htmlspecialchars($_SESSION["prefecture2"],ENT_QUOTES);
    $session_city2=htmlspecialchars($_SESSION["city2"],ENT_QUOTES);
    $session_area2=htmlspecialchars($_SESSION["area2"],ENT_QUOTES);

    // $session_lastName=htmlspecialchars($_SESSION["lastName"],ENT_QUOTES);
    // $session_firstName=htmlspecialchars($_SESSION["firsName"],ENT_QUOTES);
    // $session_areacode=htmlspecialchars($_SESSION["areacode"],ENT_QUOTES);
    // $session_areacode2=htmlspecialchars($_SESSION["areacode2"],ENT_QUOTES);
    // $session_message=htmlspecialchars($_SESSION["message"],ENT_QUOTES);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>postCode label</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>はがき宛名作成ツール</h1>

    
    <div class="postcard">
        <div class="stmps">
            <img src="img/OIP.png" alt="切手">
        </div>
        <div class="borders">
            <div class="border"></div>
            <div class="border"></div>
            <div class="border"></div>
            -
            <div class="border"></div>
            <div class="border"></div>
            <div class="border"></div>
            <div class="border"></div>
        </div>
        <div class="output-yourZipcode">
            <?php echo mb_substr($session_address,0,3); ?>
            <?php echo mb_substr($session_address,3,4); ?>
        </div>
        <div class="output_yourAddress">
            <p class="vertical">
                <output name="result" form="prefecture"><?php echo $session_prefecture; ?></output><output name="result" form="city"><?php echo $session_city; ?></output><output name="result" form="area"><?php echo $session_area; ?></output><output name="result" form="areaCode"></output>
            </p>
        </div>
        <div class="output_yourAddress2">
            <p class="vertical"><output name="result" form="areaCode2"></output></p>    
        </div>
        <div class="output_yourName">
            <p class="vertical"><output name="result" form="lastName"></output> <output name="result" form="firstName"></output> 様</p> 
        </div>

        <div class="borders2">
            <div class="border2"></div>
            <div class="border2"></div>
            <div class="border2"></div>
            -
            <div class="border2"></div>
            <div class="border2"></div>
            <div class="border2"></div>
            <div class="border2"></div>
        </div>
        <div class="output-myZipcode">
            <?php echo mb_substr($session_address2,0,3); ?>
            <?php echo mb_substr($session_address2,3,4); ?>
        </div>
        <div class="output_myAddress">
            <p class="vertical">
                <output name="result" form="prefecture2"><?php echo $session_prefecture2; ?></output><output name="result" form="city2"><?php echo $session_city2; ?></output><output name="result" form="area2"><?php echo $session_area2; ?></output><output name="result" form="areaCode3"></output>
            </p>
        </div>
        <div class="output_myAddress2">
            <p class="vertical"><output name="result" form="areaCode4"></output></p>    
        </div>
        <div class="output_myName">
            <p class="vertical"><output name="result" form="lastName2"></output> <output name="result" form="firstName2"></output></p> 
        </div>
    </div>


    <div class="your">
        <h2>宛先情報入力</h2>
        <div class="your_name">
            <form onsubmit="return false" id="lastName" oninput="result.value = String(last_name.value) ;">
                <p>姓：<input type="text" name="last_name" placeholder="例) 電大"></p>
            </form>
            <form onsubmit="return false" id="firstName" oninput="result.value = String(first_name.value) ;">
                <p>名：<input type="text" name="first_name" placeholder="例) 太郎"></p>
            </form>
        </div>
        
        <div class="your_zipcode">
            <form action="zipcode_do.php" method="POST" id="zipCode" oninput="result.value = Number(zip_code.value) ;">
                <p>郵便番号 *ハイフンなし：
                <input type="text" pattern="\d{7}" title="7桁の数字でご入力ください。" name="zip_code" placeholder="例) 0640941" value="<?php echo $session_address; ?>">
                </p>
                <input type="submit" value="住所検索">
            </form>
            
            <form onsubmit="return false" id="prefecture" oninput="result.value = String(prefecture.value) ;">
                <p>都道府県：<input type="text" name="prefecture" placeholder="例) 北海道" value="<?php echo $session_prefecture; ?>" ></p>
            </form>
            <form onsubmit="return false" id="city" oninput="result.value = String(city.value) ;">
                <p>市町村：<input type="text" name="city" placeholder="例) 札幌市中央区" value="<?php echo $session_city; ?>" ></p>
            </form>
            <form onsubmit="return false" id="area" oninput="result.value = String(area.value) ;">
                <p>番地：<input type="text" name="area" placeholder="例) 旭ヶ丘" value="<?php echo $session_area; ?>" ></p>
            </form>
            <form onsubmit="return false" id="areaCode" oninput="result.value = String(area_code.value) ;">
                <p>番地：<input type="text" name="area_code" placeholder="例) 19丁目" ></p>
            </form>
            <form onsubmit="return false" id="areaCode2" oninput="result.value = String(area_code2.value) ;">
                <p>住所2：<input type="text" name="area_code2" placeholder="マンション名など" ></p>
            </form>
        </div>

        <!-- <form class="button" action="add_do.php" method="POST" id="add">
            <input type="submit"  value="住所録登録" >
            <?php echo $session_message; ?>
        </form>
        <a href="allAddress.php" class="button">住所録一覧</a> -->
    </div>


    <div class="my">
        <h2>差出人情報入力欄</h2>
        <div class="my_name">
            <form onsubmit="return false" id="lastName2" oninput="result.value = String(last_name2.value) ;">
                <p>姓：<input type="text" name="last_name2" placeholder="例) 電大"></p>
            </form>
            <form onsubmit="return false" id="firstName2" oninput="result.value = String(first_name2.value) ;">
                <p>名：<input type="text" name="first_name2" placeholder="例) 太郎"></p>
            </form>
        </div>
        
        <div class="my_zipcode">
            <form action="zipcode_do2.php" method="POST" id="zipCode2" oninput="result.value = Number(zip_code2.value) ;">
                <p>郵便番号 *ハイフンなし：
                <input type="text" pattern="\d{7}" title="7桁の数字でご入力ください。" name="zip_code2" placeholder="例) 0640941" value="<?php echo $session_address2; ?>">
                </p>
                <input type="submit" value="住所検索">
            </form>
            
            <form onsubmit="return false" id="prefecture2" oninput="result.value = String(prefecture2.value) ;">
                <p>都道府県：<input type="text" name="prefecture2" placeholder="例) 北海道" value="<?php echo $session_prefecture2; ?>"></p>
            </form>
            <form onsubmit="return false" id="city2" oninput="result.value = String(city2.value) ;">
                <p>市町村：<input type="text" name="city2" placeholder="例) 札幌市中央区" value="<?php echo $session_city2; ?>"></p>
            </form>
            <form onsubmit="return false" id="area2" oninput="result.value = String(area2.value) ;">
                <p>番地：<input type="text" name="area2" placeholder="例) 旭ヶ丘" value="<?php echo $session_area2; ?>"></p>
            </form>
            <form onsubmit="return false" id="areaCode3" oninput="result.value = String(area_code3.value) ;">
                <p>番地：<input type="text" name="area_code3" placeholder="例) 19丁目"></p>
            </form>
            <form onsubmit="return false" id="areaCode4" oninput="result.value = String(area_code4.value) ;">
                <p>住所2：<input type="text" name="area_code4" placeholder="マンション名など"></p>
            </form>
        </div>
    </div>
    

</body>
</html>