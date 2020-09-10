<?php include 'config.php'?>
<?php include 'header.php'?>
<?php

/*
1)if day is passed via GET, show $day's blog
2)if it's today, shows $today's blog
3)place a link to show today's blog (if on another day)
*/

if(isset($_GET['day'])) {
  //if day is passed via GET, show $day's blog
  $today = $_GET['day'];
}else{
  //if it's today, shows $today's blog
  $today = lcfirst(date('l'));
}

switch ($today) {
  case 'sunday';
    $category = 'PHP';
    $img = 'php';
    break;
  case 'monday';
    $category = 'Angular';
    $img = 'angular';
    break;
  case 'tuesday';
    $category = 'Linux';
    $img = 'linux';
    break;
  case 'wednesday';
    $category = 'JavaScript';
    $img = 'js';
    break;
  case 'thursday';
    $category = 'Python';
    $img = 'python';
    break;
  case 'friday';
    $category = 'Java';
    $img = 'java';
    break;
  case 'saturday';
    $category = 'Node.js';
    $img = 'node';
    break;
}
?>



<style>i.daily-icon{font-size:300px;}</style>
<p><?=ucfirst($today)?>'s blog category is: <?=$category?></p>
<p><i class="fab fa-<?=$img?> daily-icon"></i></p>
<p>Click below to find other daily blog categories:</p>

<ul class="links"><li><a href="/daily/sunday">Sunday</a></li>
<li><a href="/daily/monday">Monday</a></li>
<li><a href="/daily/tuesday">Tuesday</a></li>
<li><a href="/daily/wednesday">Wednesday</a></li>
<li><a href="/daily/thursday">Thursday</a></li>
<li><a href="/daily/friday">Friday</a></li>
<li><a href="/daily/saturday">Saturday</a></li></ul>

<?php include 'footer.php'?>