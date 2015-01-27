<!DOCUTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    
    <title>Stream Text Register</title>
    <link rel="stylesheet" type="text/css" href="css/common.css" media="all"></link>
    <link rel="stylesheet" type="text/css" href="css/inputText.css" media="all"></link>


</head>

<body>
	<div class="container" id="container">

		<header class="header">
			<h1 class="header__title">メッセージ入力</h1>
		</header>
	
        <div class="contents">

            <p class="contents__explain">メッセージを入力してして下さい</p>

            <form id="inputTextForm" class="contents__form" action="php/registerText.php" method="post" id="inputText">
                <ul>
                    <li class="form__list">
				        <label class="list__label" for="user">名前: </label>
				        <input class="list__inputText" type="text" name="user"></input>
                    </li>
                    <li class="form__list"> 
                        <label class="list__label" for="msg">メッセージ: </label>
                        <textarea class="list__textArea" name="msg"></textarea>
                    </li>
                </ul> 
			    <input class="form__submitBtn" type="submit" name="Send" value="送信"></input>
            </form>

            <p class="contents__link"><a href="index.php">戻る</a></p>


		</div><!-- contents -->

	</div><!-- container --> 

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/ajaxFunc.js"></script>
    <script type="text/javascript" src="js/inputText.js"></script>


</body>
</html>
