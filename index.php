<?php include 'config.php'?>
<?php include 'header.php'; ?>

          <div class="post-preview">
            <a href="blog/15">
              <h2 class="post-title">
                Every programmer's worst nightmare
              </h2>
              <h3 class="post-subtitle">
                Searching for the ever elusive semi-colon.
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Bootstrap This</a>
              on September 24, 2018</p>
          </div>
          <hr>
          <?php 

/*
 *blogs.php
*/

// Create connection
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from blogs limit 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '
          <div class="post-preview">
            <a href="blog/' . $row['BlogID'] . '">
              <h2 class="post-title">' .
                $row['BlogTitle']
              . '</h2>
            </a>
            <p class="post-meta">Posted by' .
              
              substr($row['BlogEntry'], 0, 140)
              .
            '</p>
          </div>
          <hr>
        ';
    }
} else {
    echo "<p>No blog entries found.</p>";
}
$conn->close();

?>
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="blogs/">All Posts &rarr;</a>
          </div>

<?php include 'footer.php'; ?>