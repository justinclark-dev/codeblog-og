<?php
/*
 *debug.php - file for handling errors
 *IMPORTANT: set DEBUG to FALSE in production
**/
define('DEBUG',TRUE); //set to TRUE to see all errors in development
function myerror($errorFile, $errorLine, $errorMsg) {
  if(defined('DEBUG') && DEBUG) {
    echo '
      Error in file: <b>' . $errorFile . '</b>
      on line: <b>' . $errorLine . '</b><br>
      Error Message: <b>' . $errorMsg . '</b><br>';
    die();
  }else{
    echo 'Oh snap!  There\'s an error!';
    die();
  }
}
?>