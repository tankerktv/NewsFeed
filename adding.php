
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Добавление новости</title>

    <link href="dist/css/bootstrap.css" rel="stylesheet">
	<link href="jumbotron.css" rel="stylesheet">
  </head>

  <body> 
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Nobody Cares</a>         
        </div>
		<form class="navbar-form navbar-right">
            <a href="index.php" type="submit" class="btn btn-success">Вернуться на главную</a>
        </form>
      </div>
    </div>

<?php
	error_reporting(0);
    $host="localhost";
    $user="root";
    $pass="ZasadaKTV3350";
    $db_name="sashabase";
    $link=mysql_connect($host,$user,$pass);
    mysql_select_db($db_name,$link);
	//Подключились к БД нашей
	//запрос на инсерт в бд
	$_POST['Date'] = date("Y-m-d H:i:s");
	$_POST['Pic'] = "none";
	if ($_POST['User'] == null){$_POST['User'] = "Anonymous";};
	if (isset($_POST["Heading"],$_POST["Content"])) {
    $sql = mysql_query("INSERT INTO `news` (`Date`, `User`, `Content`, `Heading`, `Pic`) 
                        VALUES ('".$_POST['Date']."','".$_POST['User']."','".$_POST['Content']."','".$_POST['Heading']."','".$_POST['Pic']."')
						");
	//все
    if ($sql) {
        echo "<p>ДЕБАГ ИНФО: Данные успешно добавлены в таблицу. Это вывелось с помощью echo в php.</p>";
    } else {
        echo "<p>ДЕБАГ ИНФО: Произошла ошибка. Это вывелось с помощью echo в php</p>";
    }
}
?>

<!--рабочий ввод УУУ-->
	<div class="container">
		<form action="" method="post">
        	<p><h2>Настоятельно не рекомендую нажимать F5 для обновления страницы, если уже была добавлена запись, поскольку тогда можно случайно сделать "дубликат" записи в БД</h2></p>
			<p>Заголовок:</p>
			<p><input type="text" class="form-control" name="Heading"></p>
			<p>Новость:</p>
			<p><input type="text" class="form-control" name="Content"></p>
			<p>Ваше имя (необязательно):</p>
			<p><input type="text" class="form-control" name="User"></p>
		  <p><button class="btn btn-warning" input type="submit">Добавить</button></p>
		</form>
		<footer>
        <p>&copy; Все права защищены. 2015 год.</p>
		</footer>
	</div>
  
    <script src="assets/js/jquery.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
	<script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/json2.js"></script>
  </body>
</html>
