<?php
require 'Session.php';
Session::isValidUser();
?>
<h1>Espace Administration</h1>
<?php echo Session::getUser()->getUsername(); ?>