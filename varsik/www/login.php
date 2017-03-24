<?php 
	include 'db.php';
		if(isset($_POST['submit_login'])) {
			$user_name = mysqli_real_escape_string($mysqli, trim($_POST['user_name']));
			$user_pass = md5($_POST['user_pass']);

				$query = "SELECT * FROM `users` WHERE `nickname` = '$user_name' AND `password` = '$user_pass'";
				$data = mysqli_query( $mysqli, $query);
				$row = mysqli_num_rows($data);
						if($row == 1){
								$user = mysqli_fetch_assoc($data);

								$_SESSION['user_id'] = $user['user_id'];		
								$_SESSION['logged_user'] = $user_name;
								$_SESSION['pass_user'] = $user_pass;
								$home_url = '/user_page.php';
								header('Location: ' . $home_url);
							}
							else {
								echo "<p style='margin-top:20px; text-align: center; color: #B22222; font-size: 24px; font-weight: bold'> Логин или пароль введено не верно</p>";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <div class="log-in">
  <h1>Вход на форум</h1>
  	<form role="form" action="/login.php" method="POST">
  		<div class="form-group">
  			<label>
  				<input class="form-control" type="text" name="user_name" placeholder="Логин" required>
  			</label>
  		</div>
  		<div class="form-group">
  		<label>
  			<input class="form-control" type="password" name="user_pass" placeholder="Пароль" required>
  		</label>
  		</div>
  		<div class="form-group">
  			<p><button name="submit_login" type="submit" class="btn btn-primary">Войти</button>
  			<a href="/signup.php" type="button" class="btn btn-primary">Регистрация</a></p>
  		</div>
  	</form>
  </div>
</body>
</html>
