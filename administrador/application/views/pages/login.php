<!DOCTYPE html>
	<html lang="en">
	<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>administrador General Unicomer</title>
	    <link rel="stylesheet" href="assets/css/foundation.css" />
	    <link rel="stylesheet" href="assets/css/style.css" />
	    <script src="assets/js/vendor/modernizr.js"></script>
	    <script src="assets/js/vendor/jquery.js"></script>
	    <script src="assets/js/foundation/foundation.js"></script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    </head>
  <body>
	<div class="large-3 large-centered columns loginContent">
   		<?php echo form_open('login'); ?>
	  <div class="login-box">
	    <div class="row">
	      <div class="large-12 columns text-center">
	      	<div class="col-lg-12 logoLogin">
	      		<img class="responsive-img" src="assets/img/logo.png"> 
	      	</div>
	      	
	        <form>
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
	  <div class="col-lg-12 text-center">
	  	<?php echo validation_errors(); ?>
	  </div>
	</div>
	</body>
</html>