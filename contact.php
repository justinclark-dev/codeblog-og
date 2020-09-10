<?php include 'config.php'?>
<?php include 'header.php'?>

          <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->

<?php 

function sendEmail($to, $subject, $message, $replyTo='') {
  $fromDomain = $_SERVER['SERVER_NAME'];
  $fromAddress = 'noreply@' . $fromDomain;
  if($replyTo=='') {$replyTo='';}
  $headers = 'From: ' . $replyTo . PHP_EOL .
    'Reply-To: ' . $replyTo . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();
  return mail($to, $subject, $message, $headers);
}

if(isset($_POST['name'])) {

  /*echo '<pre>';
  echo var_dump($_POST);
  echo '</pre>';
  die;*/

  $today = date('m/d/Y H:i');  

  $to = EMAIL;
  $subject = 'Code Contact Page, sent: ' . $today;
  $message = process_post();
  $replyTo = EMAIL;

  sendEmail($to, $subject, $message, $replyTo);

  echo '
    <p>' . $_POST['name'] . ', your message has been sent successfully!</p>
    <p><a href=""><button class="btn btn-primary">BACK</button></a></p>
  ';

}else{

  echo '
          <form name="sentMessage" id="contactForm" action="" method="post" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" name="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
          </form>
  ';
}

?>

<?php include 'footer.php';

function process_post() {
  $myReturn = '';
  foreach($_POST as $varName=> $value) {
    //loop POST vars to create JS array on the current page - include email
    $strippedVarName = str_replace('_',' ',$varName);//remove underscores
    if(is_array($_POST[$varName])) {
      //checkboxes are arrays, and we need to collapse the array to comma separated string!
      $myReturn .= $strippedVarName . ': ' .
      implode(',',$_POST[$varName]) . PHP_EOL;
    }else{
      $myReturn .= $strippedVarName . ': ' . $value . PHP_EOL;
    }
  }
  return $myReturn;
}

?>

  