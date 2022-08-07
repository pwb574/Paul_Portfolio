<?php
  /*Make sure the form input is good */
  function IsInjected($str)
  {
      $injections = array('(\n+)',
             '(\r+)',
             '(\t+)',
             '(%0A+)',
             '(%0D+)',
             '(%08+)',
             '(%09+)'
             );
                 
      $inject = join('|', $injections);
      $inject = "/$inject/i";
      
      if(preg_match($inject,$str))
      {
        return true;
      }
      else
      {
        return false;
      }
  }
  
  if(IsInjected($visitor_email))
  {
      echo "Bad email value!";
      exit;
  }

  $name = $_POST['fname' + " " + 'lname'];
  $visitor_email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $email_from = 'paulwbessler@utexas.edu';

  $email_subject = $subject;

  $email_body = "You have received a new message from your portfolio website from: $name at $visitor_email.\n".
                            "Here is the message:\n $message".


  $to = "paulwbessler@utexas.edu";

  $headers = "From: $email_from \r\n";

  $headers .= "Reply-To: $visitor_email \r\n";

  mail($to,$email_subject,$email_body,$headers);

 ?>