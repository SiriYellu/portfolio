<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  */

  // Replace with your email address
  $receiving_email_address = 'siri.y0285@gmail.com';

  if(file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // SMTP configuration for Gmail
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'siriyellu20025@gmail.com', // Your Gmail address
    'password' => 'your_app_specific_password', // Your Gmail app-specific password
    'port' => '587'
  );

  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['phone'], 'Phone', '+1 470-854-8678');
  $contact->add_message($_POST['message'], 'Message', 10);

  echo $contact->send();
?>
