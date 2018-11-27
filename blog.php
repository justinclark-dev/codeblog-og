<?php include 'includes/config.php'?>
<?php get_header()?>
<?php 

/*
 *blog.php - displays a single blog entry
 */

//process querystring
if(isset($_GET['id'])) {
  $id = (int)$_GET['id'];
}else{//redirect to the blogs page that lists all blogs
  header('Location:blogs.php');
}

//set the value for previous and next blogs for navigation
$previous = $id-1;
$next = $id+1;
if($id == 1) {
  $previous = 20;
}elseif($id == 20) {
  $next = 1;
}

// Create connection
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
} 

echo '
  <style>i.blog-nav {font-size:50px;color:white;}</style>

  <a href="blog.php?id=' . $previous . '">
    <i class="far fa-hand-point-left float-left blog-nav" style="margin: 0 40px;"></i>
  </a>
  <a href="blog.php?id=' . $next . '">
    <i class="far fa-hand-point-right float-right blog-nav" style="margin: 0 40px;"></i>
  </a>
  <div class="clear"></div>
';

$sql = "select * from blogs where BlogID = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '
          <h2 class="post-title">' . $row['BlogTitle']. '</h2>
          <p><img src="img/blogs/' . $row['BlogImg']. '" width="700px"></p>
          <p>' . $row['BlogEntry']. '</p>
        ';
    }
} else {
    echo "<p>No blog entry found.</p>";
}
$conn->close();

echo '
  <a href="blog.php?id=' . $previous . '">
    <i class="far fa-hand-point-left float-left blog-nav" style="margin: 0 40px;"></i>
  </a>
  <a href="blog.php?id=' . $next . '">
    <i class="far fa-hand-point-right float-right blog-nav" style="margin: 0 40px;"></i>
  </a>
  <div class="clear"></div>
';

?>
<?php get_footer() ?>