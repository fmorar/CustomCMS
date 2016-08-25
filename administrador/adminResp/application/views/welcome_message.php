<!DOCTYPE html>
<html>
	<head>
	  <!--Import Google Icon Font-->
	  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <!--Import materialize.css-->
	  <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
	  <link type="text/css" rel="stylesheet" href="assets/css/style.css" />

	  <!--Let browser know website is optimized for mobile-->
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body class="grey lighten-3">
		<div class="container">
			<div class="row">
		      	<div class="col s3">&nbsp;</div>
		      	<div class="col s6">
		      		<div class="row">
		      			<div class="col s12">
				      		<img class="responsive-img" src="assets/img/logo.png">  				
		      			</div>
		      		</div>
		      		<div class="row">
					    <form class="col s12">
					      <div class="row">
					        <div class="input-field col s12">
					          <input id="Usuario" type="text" class="validate">
					          <label for="Usuario">Usuario</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12">
					          <input id="password" type="password" class="validate">
					          <label for="password">Contraseña</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12">
					          <input type="submit" id="btnIngreso" value="Ingresar" class="btn waves-effect waves-light">
					        </div>
					      </div>
					    </form>
				  	</div>
		      	</div>
		      	<div class="col s3">&nbsp;</div>
		    </div>
      	</div>
	  <!--Import jQuery before materialize.js-->
	  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="assets/js/materialize.min.js"></script>
	</body>
</html>