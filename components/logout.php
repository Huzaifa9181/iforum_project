<?php

session_start();
session_destroy();

header("location: /php_forum/index.php?logout=true");

?>