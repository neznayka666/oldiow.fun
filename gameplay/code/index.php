<?php
$host=GetEnv("HTTP_HOST");
Header("Location: //$host");
?>