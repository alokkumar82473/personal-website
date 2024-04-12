<?php
  /**
   * Requires the "PHP Email Form" library (Pro Version Only)
   * The library should be uploaded to: vendor/php-email-form/php-email-form.php
   * For more info and help: https://bootstrapmade.com/php-email-form/
   */

  // Replace with your actual receiving email address (important!)
  $receiving_email_address = 'alokkumarlpu1@gmail.com';

  // Check if library exists, handle error if not found
  if (!file_exists('../assets/vendor/php-email-form/php-email-form.php')) {
    die('Unable to load the "PHP Email Form" Library!');
  }

  include('../assets/vendor/php-email-form/php-email-form.php');

  $contact = new PHP_Email_Form;
  //$contact->ajax = true;

  // Set recipient (ensure it matches your `$receiving_email_address`)
  $contact->to = $receiving_email_address;

  // Extract form data (assuming your form has these fields)
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];  // Add subject line if desired

  // Uncomment and configure SMTP for external mail servers (optional)
  /*
  $contact->smtp = array(
    'host' => 'smtp.example.com',  // Replace with your SMTP server host
    'username' => 'your_username',  // Replace with your SMTP username
    'password' => 'your_password',  // Replace with your SMTP password
    'port' => 587                 // Replace with your SMTP port (common is 587)
  );
  */

  // Add form field messages (modify these based on your form structure)
  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['message'], 'Message', 10);

  // Send the email and handle the response
  $send_result = $contact->send();
  if ($send_result) {
    echo 'Message sent successfully!';
  } else {
    echo 'Error sending message: ' . $contact->get_error_message();
  }
?>
