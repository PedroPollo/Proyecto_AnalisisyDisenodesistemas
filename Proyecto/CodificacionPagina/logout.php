<?php
session_start();
session_unset();
session_unset();
header('location:index.html');
?>