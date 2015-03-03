<?php

date_default_timezone_set('Asia/Tokyo');

$startTime = filter_input(INPUT_GET, 'startTime');
$startTime = $startTime ?: date('Y-m-d H:i:s');

?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
    <title>Stream Text (WebSocket Demo)</title>
    <link rel="stylesheet" type="text/css" href="css/common.css" media="all"></link>
    <link rel="stylesheet" type="text/css" href="css/streamText.css" media="all"></link>
</head>

<body>
    <div class="container" id="container">
        <canvas class="container__screen" id="screen"></canvas>
    </div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="http://autobahn.s3.amazonaws.com/js/autobahn.min.js"></script><!-- AutobahnJs (for using WAMP v1) -->
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/ajaxFunc.js"></script>
    <script type="text/javascript" src="js/streamText.js"></script>
    <script type="text/javascript">
    
        var startTime = "<?php print $startTime; ?>"; 
        
    </script>     

</body>
</html>
