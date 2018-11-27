<?php
/*
 *config.php - Stores configuration data for the application
**/
ob_start();//prevent header errors
include 'debug.php';
require_once('db_connection.php');
require_once('db_functions.php');

$db = db_connect();

include 'ads.php';
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//default page values
$title = THIS_PAGE;
$siteName = 'codeBlog{';
$slogan = 'Adventures_in_code[...]';
$heading = '';
$subheading = '';
$bannerAdRandomizer = '';
$sideAdRotater = '';
$bannerAd = '';
$sideAd = '';
$displayAds = FALSE;

//array for main navigation links
$navMain['index.php'] = 'Home';
$navMain['template-sql.php'] = 'Database Test';
$navMain['about.php'] = 'About';
$navMain['daily.php'] = 'Daily';
$navMain['blogs.php'] = 'Blogs';
$navMain['request.php'] = 'Request Blog';
$navMain['contact.php'] = 'Contact';

switch(THIS_PAGE){
  case '500.php';
    $title = 'Internal Server Error';
    $heading = '';
    $subheading = '';
    break;
  case 'template.php';
    $title = 'My template page';
    $heading = 'Template File';
    $subheading = 'This content is from template.php';
    break;
  case 'template-sql.php';
    $title = 'DB Test/Template';
    $heading = 'Database Test / SQL Template page';
    $subheading = 'This page is for testing for SQL data, and as a starting point for new SQL using pages';
    break;
  case 'index.php';
    $title = 'Home page';
    $heading = 'Home';
    $subheading = 'There\'s no place like home';
    $displayAds = TRUE;
    break;
  case 'daily.php';
    $title = 'Daily Blog';
    $heading = 'Daily code blogs';
    $subheading = 'Blog, blog, blog...';
    break;
  case 'contact.php';
    $title = 'Contact Page';
    $heading = 'Contact me';
    $subheading = 'I\'d like to hear from you!';
    break;
  case 'request.php';
    $title = 'Request Blog';
    $heading = 'Request a blog';
    $subheading = 'Use this form to request a new blog entry.';
    break;
  case 'about.php';
    $title = 'About Me';
    $heading = 'About me';
    $subheading = 'This is what I do.';
    break;
  case 'blog.php';
    $title = 'Blog Entry';
    $displayAds = TRUE;
    //not using $heading and $subheading on this page
    break;
  case 'blogs.php';
    $title = 'Blogs List';
    $displayAds = TRUE;
    //not using $heading and $subheading on this page
    break;
}

/*
 * makeLinks() creates navigation from array stored in config.php
 * usage: echo makeLinks($navMain);
*/
function makeLinks($nav) {
  $navigation = '';
  foreach($nav as $page => $name) {
    if(THIS_PAGE == $page) { //current page add .active class
      $navigation .= '
        <li class="nav-item">
          <a class="nav-link active" href="' . $page . '">' . $name . '</a>
        </li>
      ';
    }else{
      $navigation .= '
        <li class="nav-item">
          <a class="nav-link" href="' . $page . '">' . $name . '</a>
        </li>
      ';
    }
  }
  return $navigation;
}

if ($displayAds == TRUE) {
    $bannerAdRandomizer = randomize($sideAds);
    $sideAdRotater = rotate($bannerAds);
    $sideAd = '
        <div class="col-lg-4 col-md-2 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
              <img src="' . $bannerAdRandomizer . '"
                style="width:300px;">
          </div>
        </div><!--/sidebar-->
    ';
    $bannerAd = '
        <div class="container">
          <div class="row">
            <div style="margin:0 auto;">
              <img src="' . $sideAdRotater . '" 
                style="
                  margin-top:-330px;
                  z-index: 100; 
                  width: 600px;
                  position: relative; 
                  background: #fff;" >
            </div>
          </div>  
        </div>
    ';
}

?>