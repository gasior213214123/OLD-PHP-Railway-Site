<div align="center">
<?php
if(!$LOGGED) { header('Location: index.php'); exit(); }

$LOGGED = false;
session_unset();
unset($_SESSION);
session_destroy();
echo "wylogowano";
?>
</div>