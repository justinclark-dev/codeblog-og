<?php include 'config.php'?>
<?php include 'header.php'?>
<?php

  $result = get_all_blogs();  
  
  if(mysqli_num_rows($result) != 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo '
        <p><b>BlogID: </b>' . $row['BlogID'] . '<br>
        <b>BlogTitle: </b>' . $row['BlogTitle'] . '<br>
        <b>BlogImg: </b>' . $row['BlogImg'] . '<br>
        <b>BlogEntry: </b>' . substr($row['BlogEntry'], 0, 50) . '</p>
        <hr>
      ';
    }
  }else{
    echo '
      <p>Error in sql table.  Reload the sql script to reload the test data</p>
    ';
  }

  mysqli_free_result($result);

?>
<?php include 'footer.php'?>