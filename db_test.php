<?php include 'includes/config.php'?>

<?php  //db_test.php

  
//-------------------------------------------------------
function newsqlfunction($id) {
  global $db;

  $sql = '
    select * from blogs 
    where BlogID = ' . $id . '
  ';
  $result = mysqli_query($db, $sql);
  return $result;
}
//-------------------------------------------------------

  $result = get_blog(1);  

  while($blog = mysqli_fetch_assoc($result)) {
    echo $blog['BlogTitle'] . '<hr>';
  }

  mysqli_free_result($result);

?>