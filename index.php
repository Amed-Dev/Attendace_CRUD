<?php
if (empty($_SESSION[''])) {
  header('location:./app/views/index.php');
} else {
  header('location: ./app/views/asistencia/index.php');
}