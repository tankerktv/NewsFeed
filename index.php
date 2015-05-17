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
		<div class="navbar-collapse collapse"> <!--пофикшено, теперь на мобилке ниче не перекашивает-->
		  <div class="navbar-right navbar-form">
			<button onclick="showaddingform()" class="btn btn-success">Добавить новость</button>
		  </div>		
		</div>
      </div>
    </div>
	
	<div onclick="closeallwindows('index')" id="wrap"></div>
	<div id="addingform">
		<div class="container">
			<form>
				<p><h2>Добавление Новости</h2></p>
				<p>Заголовок:</p>
				<p><textarea type="text" class="form-control" name="Heading"></textarea></p>
				<p>Новость:</p>
				<div class="form-group form-group-lg">
				<p><textarea wrap="hard" type="text" class="form-control-overriden" name="Content"></textarea></p>
				</div>
				<p>Ваше имя (необязательно):</p>
				<p><textarea type="text" class="form-control" name="User"></textarea></p>
				<p><button class="btn btn-warning" input type="button" onclick="adding()">Добавить</button></p>
			</form>
		</div>
	</div>

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
				<p><button class="btn btn-primary btn" input type="button" onclick="editing(1)">Сохранить</button></p> 
				<!--editing(1) потому что здесь форма редактирования имеет номер 1, а не 0-->
			</form>
		</div>
	</div>
	
    <div class="container">
        <div id="news">
			<div class="row">
			<script id="NewsTemplate" type="text/template">
				<h2><%=heading%></h2>
				<p><%=content%></p>
				<small><%=user%></small>
				<div class="btn-group btn-group-xs pull-right" role="group">
					<a href="<%=idr%>" type="button" class="btn btn-primary">Подробнее</a>
					<button onclick="showeditingform(<%=idr%>, 'index')" class="btn btn-warning">Изменить</button> <!--по сути вызывается тожно так же, как и удаление-->
					<button onclick="deleting(<%=idr%>)" class="btn btn-danger">Удалить</button>
				</div>
				<br>
					<small><%=date%></small>	
			</script>
			</div>	
		</div>
	</div>


<hr>

    <script src="assets/js/jquery.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
	<script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/json2.js"></script>
    <script src="js/underscore-min.js"></script>
    <script src="js/backbone-min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
