
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Новости</title>

    <link href="dist/css/bootstrap.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
  </head>

  <body> 

<?php
$idvar = $_GET['id'];
$link = mysql_connect('localhost', 'highvoltage', 'ZasadaKTV3350');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("sashabase") or die("cannot connect to the database" . mysql_error());

$data = mysql_query("SELECT id, date, user, heading, content FROM news WHERE ID=$idvar")  or die(mysql_error());
$info = mysql_fetch_array( $data );

$infoarray = array('id','date','user','heading','content');
?>

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
      </div>
    </div>
	
	<div onclick="closeallwindows(1)" id="wrap"></div>
	<div id="editingform"> <!--див окошка редактирования-->
		<div class="container">
			<form>
				<p><h2>Изменение новости</h2></p>
				<p>Заголовок:</p>
				<p><textarea type="text" class="form-control" name="Heading"></textarea></p>
				<p>Новость:</p>
				<div class="form-group form-group-lg">
				<p><textarea wrap="hard" type="text" class="form-control-overriden" name="Content"></textarea></p>
				</div>
				<p>Ваше имя (необязательно):</p>
				<p><textarea type="text" class="form-control" name="User"></textarea></p>
				<input type="hidden" name="ID">
				<p><button class="btn btn-primary btn" input type="button" onclick="editing(0)">Сохранить</button></p>
			</form>
		</div>
	</div>
	
	<div class="rows">		
		<div class="col-md-8 col-md-offset-2">
			<div><hr>
				<h2 class="text-center"><div id="heading"><?php echo $info['heading']?></div></h2>
				<hr>
				<p><div id="content"><?php echo $info['content']?></div></p>
				<hr class="text-center"><small><div id="user"><?php echo $info['user']?></div></small>
				<div class="btn-group btn-group-lg pull-right" roles="group">
					<a href="/" type="button" class="btn btn-primary">Назад</a>
					<button onclick="showeditingform(<?php echo $idvar ?>)" class="btn btn-warning">Изменить</button>
					<button onclick="deleting(<?php echo $idvar ?>)" class="btn btn-danger">Удалить</button>
				</div> 
				<br>
				<small class="text-center"><?php echo $info['date']?></small>
			</div>
		</div>
	</div>
	
	
    <script src="assets/js/jquery.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
	<script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/json2.js"></script>
    <script src="js/underscore-min.js"></script>
    <script src="js/backbone-min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>