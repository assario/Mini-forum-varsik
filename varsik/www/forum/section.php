<?php include "..\db.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mini-forum</title>
<link href="..\css/bootstrap.min.css" rel="stylesheet">
    <link href="..\style.css" rel="stylesheet">
  </head>
  <body> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <div class="header">
    		<a class="btn btn_f" href="/forum/section.php" role="button">Форум</a> 
            <a class="btn btn_s" href="/settings_page.php" role="button">Настройки</a> 
    		<a class="btn btn_p" href="/user_page.php" role="button">Мой кабинет</a>
    		<a class="btn btn_l" href="/logout.php" role="button">Выйти</a>
    </div>
    <div class="content content-section">

<table>
<tr><th>Разделы</th><th>Последнее сообщение</th><th>Количество тем</th></tr>
<tr><td><a href="/forum/topic.php/id/1">Раздел 1</a></td><td>-</td><td>-</td></tr>
<tr><td><a href="/forum/topic.php/id/2">Раздел 2</a></td><td>-</td><td>-</td></tr>


    </table>
    </div>
    <div class="footer">
        <div class="footer-bottom">
            <p>"Mini-forum". Все права защищены.</p>
        </div>
    </div>
</body>
</html>