<!DOCUTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Stream Text (WebSocket Demo)</title>
    <link rel="stylesheet" type="text/css" href="css/common.css" media="all"></link>
    <link rel="stylesheet" type="text/css" href="css/index.css" media="all"></link>
</head>

<body>
	<div class="container" id="container">

		<header class="header">
			<h1 class="header__title">Welcome to STREAM TEXT APP!!</h1>
		</header>
	
        <div class="contents">

            <p class="contents__explain">イベントの開始時間を設定してください</p>

            <form class="contents__form" id="startDate" action="controlText.php" method="post">
                <ul>
                    <li class="form__list">
                        <label class="list__label" for="year">年：</label>
                        <input class="list__inputText" id="year" type="text" name="year"></input>
                    </li>
                    <li class="form__list">
                        <label class="list__label" for="month">月：</label> 
                        <input class="list__inputText" id="month" type="text" name="month"></input>
                    </li>
                    <li class="form__list">
                        <label class="list__label" for="day">日：</label> 
                        <input class="list__inputText" id="day" type="text" name="day"></input>
                    </li>
                    <li class="form__list"> 
                        <label class="list__label" for="hour">時：</label> 
                        <input class="list__inputText" id="hour" type="text" name="hour"></input>
                    </li>
                    <li class="form__list"> 
                        <label class="list__label" for="minute">分：</label> 
                        <input class="list__inputText" id="minute" type="text" name="minute"></input>
                    </li>
                    <input class="form__submitBtn" type="submit" name="run" value="次へ"></input>
                </ul>
            </form>

            <p class="contents__link">メッセージの追加は<a href="inputText.php">こちら</a></p>
		</div><!-- contents -->

    </div><!-- container --> 

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/util.js"></script>
    <script type="text/javascript" src="js/index.js"></script>

</body>
</html>
