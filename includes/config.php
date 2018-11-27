<?php
/*
config.php

stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('SECURE',false); #force secure, https, for all site pages

//define('PREFIX', 'widgets_fl18_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

define('DEBUG',false); #we want to see all errors

require_once('db_connection.php');
require_once('db_functions.php');
require_once('ads.php');

include '../credentials.php';//stores database info
include 'common.php';//stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

//CHANGE TO MATCH YOUR PAGES
$config->navMain['index.php'] = 'Home';
$config->navMain['template-sql.php'] = 'Database Test';
$config->navMain['about.php'] = 'About';
$config->navMain['daily.php'] = 'Daily';
$config->navMain['blogs.php'] = 'Blogs';
$config->navMain['request.php'] = 'Request Blog';
$config->navMain['contact.php'] = 'Contact';




//create default page identifier
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF - be sure to add trailing slash!
$sub_folder = 'itc240/codeblog/';//change to 'widgets' or 'sprockets' etc.
$config->theme = 'Brick';//sub folder to themes

//will add sub-folder if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}else{
    //adjust protocol
    $protocol = (SECURE==true ? 'https://' : 'http://'); // returns true
    
}
$config->virtual_path = $protocol . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;

define('ADMIN_PATH', $config->virtual_path . 'admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . 'includes/');


//CHANGE ITEMS BELOW TO MATCH YOUR SHORT TAGS
$config->title = THIS_PAGE;

$config->siteName = 'codeBlog{';
$config->slogan = 'Adventures_in_code[...]';
$config->heading = '';
$config->subheading = '';
$config->bannerAdRandomizer = '';
$config->sideAdRotater = '';
$config->bannerAd = '';
$config->sideAd = '';
$config->displayAds = FALSE;

$config->loadhead = '';//place items in <head> element

switch(THIS_PAGE){
        
   /* case 'contact.php':    
        $config->title = 'Contact Page';    
    break;
    
    case 'appointment.php':    
        $config->title = 'Appointment Page';
        $config->banner = 'Widget Appointments!';
    break;
        
   case 'template-example.php':    
        $config->title = 'Template Page';    
    break; */   
        

  case '500.php';
    $config->title = 'Internal Server Error';
    $config->heading = '';
    $config->subheading = '';
    break;
  case 'template.php';
    $config->title = 'My template page';
    $config->heading = 'Template File';
    $config->subheading = 'This content is from template.php';
    break;
  case 'template-sql.php';
    $config->title = 'DB Test/Template';
    $config->heading = 'Database Test / SQL Template page';
    $config->subheading = 'This page is for testing for SQL data, and as a starting point for new SQL using pages';
    break;
  case 'index.php';
    $config->title = 'Home page';
    $config->heading = 'Home';
    $config->subheading = 'There\'s no place like home';
    $config->displayAds = TRUE;
    break;
  case 'daily.php';
    $config->title = 'Daily Blog';
    $config->heading = 'Daily code blogs';
    $config->subheading = 'Blog, blog, blog...';
    break;
  case 'contact.php';
    $config->title = 'Contact Page';
    $config->heading = 'Contact me';
    $config->subheading = 'I\'d like to hear from you!';
    break;
  case 'request.php';
    $config->title = 'Request Blog';
    $config->heading = 'Request a blog';
    $config->subheading = 'Use this form to request a new blog entry.';
    break;
  case 'about.php';
    $config->title = 'About Me';
    $config->heading = 'About me';
    $config->subheading = 'This is what I do.';
    break;
  case 'blog.php';
    $config->title = 'Blog Entry';
    $config->displayAds = TRUE;
    //not using $heading and $subheading on this page
    break;
  case 'blogs.php';
    $config->title = 'Blogs List';
    $config->displayAds = TRUE;
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


//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . 'themes/' . $config->theme . '/';

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    
    $config->adminWidget = '
        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a> 
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>
    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    
    $config->adminWidget = '
        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>
    ';
}
?>