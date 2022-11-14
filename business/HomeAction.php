<?php
if(isset($_POST['regresar'])){
    $message = urlencode("After clicking the button, the form will submit to home.php. When, the page home.php loads, the previous page index.php is redirected. ");
    header("Location: ../index.php");
    die;
    }