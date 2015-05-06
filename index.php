<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Новости</title>

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
          <a class="navbar-brand" href="#main">Nobody Cares</a>
          	  
        </div>
		<form class="navbar-form navbar-right">
            <a href="adding.php" type="submit" class="btn btn-success">Добавить новость</a>
        </form>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"></li>
          </ul>
          <form class="navbar-form navbar-right"> 
        </div>
      </div>
    </div>


    <div class="container">
    <!--ввод пока здесь уберу потом естесн-->
         
      <div class="row">
        <div id="news"></div>
        <script id="NewsTemplate" type="text/template">
          <h2><%=heading%></h2>
          <p><%=content%></p>
		  <small><%=user%></small>
		  <br>
		  <small><%=date%></small>
          <!--<p><a href="#<%=idr%>" class="btn btn-primary">Читать дальше</a></p>  -->
		  <hr>
	  
		</script>
        
        <!--
			$('#addnews').on('click', function (e) {

		 	})
        -->

      <hr>

      <footer>
        <p>&copy; Все права защищены. 2015 год.</p>
      </footer>
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
