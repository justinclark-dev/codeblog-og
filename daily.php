<?php include 'includes/config.php'?>

<?php

/*
1)if day is passed via GET, show $day's coffee
2)if it's today, shows $today's coffee
3)place a link to show today's coffee (if on another day)
*/

if(isset($_GET['day'])) {
  //if day is passed via GET, show $day's coffee
  $today = $_GET['day'];
}else{
  //if it's today, shows $today's coffee
  $today = date('l');
}

switch ($today) {
  case 'Sunday';
    $category = 'PHP';
    $img = 'php';
    break;
  case 'Monday';
    $category = 'Angular';
    $img = 'angular';
    break;
  case 'Tuesday';
    $category = 'Linux';
    $img = 'linux';
    break;
  case 'Wednesday';
    $category = 'JavaScript';
    $img = 'js';
    break;
  case 'Thursday';
    $category = 'Python';
    $img = 'python';
    break;
  case 'Friday';
    $category = 'Java';
    $img = 'java';
    break;
  case 'Saturday';
    $category = 'Node.js';
    $img = 'node';
    break;
}

?>
<?php get_header()?>
<style>i.daily-icon{font-size:300px;}</style>
<p><?=$today?>'s blog category is: <?=$category?></p>
<p><i class="fab fa-<?=$img?> daily-icon"></i></p>
<p>Click below to find other daily blog categories:</p>
<ul class="links"><li><a href="daily.php?day=Sunday">Sunday</a></li>
<li><a href="daily.php?day=Monday">Monday</a></li>
<li><a href="daily.php?day=Tuesday">Tuesday</a></li>
<li><a href="daily.php?day=Wednesday">Wednesday</a></li>
<li><a href="daily.php?day=Thursday">Thursday</a></li>
<li><a href="daily.php?day=Friday">Friday</a></li>
<li><a href="daily.php?day=Saturday">Saturday</a></li></ul>

<?php get_footer()?>