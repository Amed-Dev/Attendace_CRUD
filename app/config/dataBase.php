<?php
$conn = new mysqli("127.0.0.1:3306", "root", "", "attendace");
if ($conn->connect_error) {
  die("Error de conexión" . $conn->connect_error);
}
