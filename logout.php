<?php
include "./_includes/config.php";

unset($_SESSION['user_id']);
unset($_SESSION['user_email']);
unset($_SESSION['user_name']);

header("Location: " . BASE_URL . "login");
