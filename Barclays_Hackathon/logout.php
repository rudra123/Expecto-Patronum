<?php

 include 'connection.inc.php';

 session_destroy();
 header('Location: index.php');

?>