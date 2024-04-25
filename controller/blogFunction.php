<?php
// functions.php

// Function to establish a database connection
function connect_to_database() {
  $conn = new mysqli('localhost', 'dckap', 'Dckap2023Ecommerce', 'Php Menus'); 
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function retrieve_data_from_database() {
  $conn = connect_to_database();
  $query = "SELECT * FROM posts WHERE status = 'published'"; 
  $result = $conn->query($query);
  $data = array();
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
       
          $row['img'] = base64_encode($row['img']);
          print_r($row['img']);
          $data[] = $row;
      
  }
  $conn->close();
  return $data;
}
}
?>
