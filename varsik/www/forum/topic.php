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
    <div class="content content-topic">

<table>
<tr><th>Тема</th><th>Дата создания</th><th>Автор</th><th>Последнее сообщение</th><th>Состояние</th></tr>
<tr><td><a href="/forum/message.php/id/1">Тема 1</a></td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
<tr><td><a href="/forum/message.php/id/2">Тема 2</a></td><td>-</td><td>-</td><td>-</td><td>-</td></tr>


    </table>
    </div>
    <div class="footer">
        <div class="footer-bottom">
            <p>"Mini-forum". Все права защищены.</p>
        </div>
    </div>
</body>
</html>
</div>
</body>
</html>