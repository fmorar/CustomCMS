<?php
// Check for empty fields
if(empty($_POST['nombre'])  		||
   empty($_POST['email']) 		||
   empty($_POST['telefono']) 		||
   empty($_POST['comentario'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['nombre'];
$email_address = $_POST['email'];
$phone = $_POST['telefono'];
$message = $_POST['comentario'];
	
// Create the email and send the message
$to = 'davs28g@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contacto desde el sitio web de ElectroliteCR:  $name";
$email_body = "Usted recibió un nuevo mensaje de contacto del sitio de ElectroliteCR.\n\n"."Detalles del formulario de contacto:\n\nNombre: $name\n\nEmail: $email_address\n\nTeléfono: $phone\n\nMensaje:\n$message";
$headers = "From: #\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>