<?php
session_start();
//load.php

// $connect = new PDO('mysql:host=localhost;dbname=loginsystem', 'root', '');
$connect = new PDO('mysql:host=localhost;dbname=planit_database', 'root', '');

$user_id = $_SESSION['userId'];
$data = array();

$query = "SELECT * FROM events WHERE user_id = '$user_id' ORDER BY id";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>
