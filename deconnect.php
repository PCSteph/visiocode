<?php
session_start();
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Finalement, on d�truit la session.
session_destroy();
?>

