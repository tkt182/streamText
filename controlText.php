<?php

date_default_timezone_set('Asia/Tokyo');

// もう少し設計を考えたら綺麗にする 
$year   = filter_input(INPUT_POST, 'year');
$month  = filter_input(INPUT_POST, 'month');
$day    = filter_input(INPUT_POST, 'day');
$hour   = filter_input(INPUT_POST, 'hour');
$minute = filter_input(INPUT_POST, 'minute'); 

$year   = $year   ?: date($year);
$month  = $month  ?: date($month);
$day    = $day    ?: date($day);
$hour   = $hour   ?: date($hour);
$minute = $minute ?: date($minute);

$startTime = "$year-$month-$day $hour:$minute:00";

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Stream Text Controller</title>
    <link rel="stylesheet" type="text/css" href="css/common.css" media="all"></link>
    <link rel="stylesheet" type="text/css" href="css/controlText.css" media="all"></link>

</head>
<body>
    <div class="container" id="container">
        <header class="header">
            <h1 class="header__title">Controller</h1>
        </header>

        <div class="contents">

            <div class="contents__color">
                <p class="color__label">Color Control</p> 
                <input class="color__btn" id="colorWhite" type="button" name="colorWhite" value="white"></input>
                <input class="color__btn"   id="colorRed"   type="button" name="colorRed"   value="red"></input>
            </div>

            <div class="contents__feedback">
                <p class="feedback__label">Feedback Control</p>
                <input class="feedback__btn"  id="feedbackEnable"  type="button" name="feedbackEnable"  value="enable"></input>
                <input class="feedback__btn" id="feedbackDisable" type="button" name="feedbackDisable" value="disable"></input>
            </div>

            <div class="contents__system">
                <p class="system__label">System Control</p>
                <input class="system__btn" id="systemStart" type="button" name="start" value="開始"></input>
                <input class="system__btn"  id="systemStop"  type="button" name="stop"  value="終了"></input>
            </div>

            <p class="contents__link"><a href="index.php">開始時間の設定に戻る</a></p>

        </div>
    </div><!-- container -->


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript "src="http://autobahn.s3.amazonaws.com/js/autobahn.min.js"></script><!-- AutobahnJs (for using WAMP v1) -->
    <script type="text/javascript "src="js/common.js"></script>
    <script type="text/javascript "src="js/ajaxFunc.js"></script>
    <script type="text/javascript" src="js/controlText.js"></script>
    <script type="text/javascript">
    
        var startTime = "<?php print $startTime; ?>"; 
        
    </script>     


</body>
</html>
