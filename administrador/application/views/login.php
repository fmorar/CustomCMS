<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador General</title>
    <link rel="stylesheet" href="assets/css/foundation.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="assets/js/vendor/modernizr.js"></script>
</head>
<body>
	<div class="row adminlogin">
		<div class="large-6 large-centered columns">
			<?php echo validation_errors(); ?>
	   		<?php echo form_open('administracion'); ?>
	    	<div class="row login-box">
	      		<div class="large-12 columns">
			        <form>
			        	<div class="row">
				        		<div class="large-2 columns text-center">
						        	<img src="assets/img/logo.png">
						      	</div>
				            <div class="large-12 columns">
				            	<h3 align="center">Administrador Gollo/Curacao</h3>
				            </div>
			          	</div>
			          	<div class="row">
				            <div class="large-12 columns">
				            	<label for="username">Usuario</label>
				              	<input type="text" name="username" id="username" placeholder="Username" />
				            </div>
			          	</div>
		          		<div class="row">
		            		<div class="large-12 columns">
		            			<label for="password">Contraseña</label>
		              			<input type="password" name="password" id="password" placeholder="Password" />
		            		</div>
		          		</div>
		          		<div class="row">
		            		<div class="large-12 large-centered columns">
		              			<input type="submit" class="button expand btn-success" value="Ingresar" />
			            	</div>
			          	</div>
			        </form>
	      		</div>
	    	</div>
	  	</div>
	</div>
    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/foundation/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>