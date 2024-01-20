<?php
$conn = new mysqli("127.0.0.1:3306", "root", "19384652", "attendance");
if ($conn->connect_error) {
  die("Error de conexión" . $conn->connect_error);
}
