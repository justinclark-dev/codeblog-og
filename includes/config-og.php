<?php

/*
 *config.php - Stores configuration data for the application
**/
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

switch(THIS_PAGE){
  case 'template.php';
    $title = 'My template page';
    $heading = 'Template File';
    $subheading = 'This content is from template.php';
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

if ($displayAds == TRUE) {
    $bannerRandomizer = randomize($sideAds);
    $sideAdRotater = rotate($bannerAds);
    $sideAd = '
        <div class="col-lg-4 col-md-2 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
              <img src="' . $sidebarRandom . '">
          </div>
        </div><!--/sidebar-->
    ';
    $bannerAd = '
        <div class="container">
          <div class="row">
            <div style="margin:0 auto;">
              <img src="' . $sidebarRotate . '" 
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