<?php 
	include 'db.php';
		if (isset($_POST['submit'])) {
			$name = mysqli_real_escape_string($mysqli, trim($_POST['nickname']));
			$pass = md5($_POST['password']);
			$email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
			$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
			$role = $_POST['role'];
			
				if(empty($_FILES['avatar']['name'])) { 
							$Num = '0';
							setcookie("user_photo", ''.$Num.'.jpg') ; //если аватарку не загрузили - ставим по умолчанию
				} 
				else {//загрузка фото
					if($_FILES['avatar']['size'] > 20000) { echo "<p style='margin-top:20px; text-align: center; color: #B22222; font-size: 24px; font-weight: bold'>Размер файла не должен превышать 5Мб</p>";}
						$imageinfo = getimagesize($_FILES['avatar']['tmp_name']);
						$arr = array('image/jpeg','image/png');
						if(!in_array($imageinfo['mime'],$arr)) { echo "<p style='margin-top:20px; text-align: center; color: #B22222; font-size: 24px; font-weight: bold'>Фото должно быть формата JPG или PNG</p>";}
						else {
							$photo = 'avatar/1/'.$_FILES['avatar']['name'].'';
							$mov = move_uploaded_file($_FILES['avatar']['tmp_name'],$photo); //Помещает фото в новое место
							if($mov) {
								require('db.php'); // подключение к БД
								$photo = stripslashes(strip_tags(trim($photo)));
								$Num = '1';
								setcookie("user_photo", ''.$Num.'/'.$_FILES['avatar']['name'].'') ;
							}
						}
				} 

			if (empty($role)) 	{
				echo "<p style='margin-top:20px; text-align: center; color: #B22222; font-size: 24px; font-weight: bold'>Вы не выбрали роль</p>";
			}	
			else {
				$data_user = mysqli_query($mysqli, "SELECT * FROM users WHERE `nickname` = '$name'");
				$row_login = mysqli_num_rows($data_user);
				$data_email = mysqli_query($mysqli, "SELECT * FROM users WHERE `email` = '$email'");
				$row_email = mysqli_num_rows($data_email);
				$data_phone = mysqli_query($mysqli, "SELECT * FROM users WHERE `phone` = '$phone'");
				$row_phone = mysqli_num_rows($data_phone);
				if ($row_login) {
					echo "<p style='margin-top:20px; text-align: center; color: #B22222; font-size: 24px; font-weight: bold'>Такой логин уже существует</p>";
					}
				elseif($row_email) {
					echo "<p style='margin-top:20px; text-align: center; color: #B22222; font-size: 24px; font-weight: bold'>Такой Email уже существует</p>";
					}
				elseif ($row_phone) {
					echo "<p style='margin-top:20px; text-align: center; color: #B22222; font-size: 24px; font-weight: bold'>Такой номер уже существует</p><";
					}
				else {
					$mysqli->query ("SET NAMES 'utf8'");
					$result = mysqli_query($mysqli, "INSERT INTO `users` SET `nickname` = '$name', `password` = '$pass', `email` = '$email', `phone` = '$phone', `role` = '$role', `photo` = '$Num'");
					$_SESSION['user_id'] = mysqli_insert_id($mysqli);
					$home_url = '/save_user.php';
					header('Location: ' . $home_url);
				}
			}
			
		}
	?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>mini-Forum</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="style.css" rel="stylesheet">
  </head>
  <body> 
  <!-- 2. Подключаем библиотеку jQuery, необходимую для работы скриптов Bootstrap 3 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <div class="sign-up">
  	<h1>Регистрация</h1>
	  	<form role="form" method="POST" action="/signup.php" enctype="multipart/form-data">
	  		<div class="form-group">
		  		<label><input class="form-control" type="text" placeholder="Логин" name="nickname" required></label>
		  	</div>
		  	<div class="form-group">
		  		<label><input class="form-control" type="password" name="password" placeholder="Пароль" required></label>
		  	</div>
		  	<div class="form-group">
		  		<label><input class="form-control" type="email" placeholder="E-mail" name="email" required></label>
		  	</div>
		  	<div class="form-group">
		  		<label><input class="form-control" type="text" name="phone" pattern="[0-9]{10}" placeholder="Номер телефона"></label>
		  	</div>
		  	<div class="form-group">
		  		<label for="file">Выберите фотографию:</label>
		  			<p><input id="file" type="file" name="avatar"></p>
		  	</div>
		  	<div class="form-group">
			  	<label>Роль: 
			  		<label class="radio-inline"><input type="radio" name="role" value="Admin">Администратор</label></br>
			  		<label class="radio-inline"><input type="radio" name="role" value="User">Пользователь</label>
			  	</label>
		  	</div>
		  	<div class="form-group">
		  		<button name="submit" type="submit" class="btn btn-primary">Зарегестрироваться</button>
		  	</div>
		</form>
	</div>
  </div>
</body>
</html>
