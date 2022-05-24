<?php
  session_start();            
  session_destroy();
  header ("header: login.php");
?>
