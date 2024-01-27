<?php
if (empty($_SESSION['user'] && empty($_SESSION['password']))) {
  header('location:./app/views/index.php');
} else {
  header('location: ./app/views/asistencia/index.php');
}