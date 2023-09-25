<?php

if($_POST) {

    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $visitor_message = "";

    

    if(isset($_POST['visitor_name'])) {
      $visitor_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }

    

    if(isset($_POST['visitor_email'])) {
    	$visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
    	$visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }

    

    if(isset($_POST['email_title'])) {
    	$email_title = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    }

    
    if(isset($_POST['visitor_message'])) {
    	$visitor_message = htmlspecialchars($_POST['message']);
    }

    

   $recipient = "blanquicettfigueroa@gmail.com";

  

    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";

    

    if(mail($recipient, $email_title, $visitor_message, $headers)) {
    	echo "<p>Gracias por contactar con nosotros, $visitor_name. Obtendra una respuesta en un plazo de 24 horas.</p>";
    } else {
    	echo '<p>El correo no pudo ser enviado, intentelo despues..</p>';
    }

    
} else {
    echo '<p>Algo salio mal.</p>';
}
?>
