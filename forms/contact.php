<?php
  /**
  * Configuration du formulaire de contact pour l'AEESTR
  */

  // Adresse email de réception
  $receiving_email_address = 'contact@aeestr.org';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Impossible de charger la bibliothèque "PHP Email Form"!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Configuration SMTP (à décommenter et configurer si nécessaire)
  /*
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'votre_email@gmail.com',
    'password' => 'votre_mot_de_passe',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'De');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
