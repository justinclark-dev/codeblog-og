<?php  //db_functions.php

function get_all_blogs() {
  global $db;

  $sql = '
    select * from blogs 
    order by BlogID
  ';
  $result = mysqli_query($db, $sql);
  return $result;
}

function get_blog($id) {
  global $db;

  $sql = '
    select * from blogs 
    where BlogID = ' . $id . '
  ';
  $result = mysqli_query($db, $sql);
  return $result;
}

?>