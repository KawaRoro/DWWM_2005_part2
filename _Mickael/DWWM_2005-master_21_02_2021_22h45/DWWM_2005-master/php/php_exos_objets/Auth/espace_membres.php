<?php
require 'Session.php';
Session::isValidUser();

?>
<h1>Espace membres</h1>
<?php 
$user = Session::getUser();
echo $user->getUsername();
echo '<br>';
echo Session::getUser()->getUsername(); ?>
