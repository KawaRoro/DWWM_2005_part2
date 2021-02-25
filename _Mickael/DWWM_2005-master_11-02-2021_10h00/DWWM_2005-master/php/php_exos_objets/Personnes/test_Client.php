<?php 

require 'Personne.php';
require 'Adresse.php';
require 'Client.php';

$datedenaissance = new DateTime('1981-11-12');

$tim = new Personne('Brown', 'Tim', $datedenaissance);


$adresse = new Adresse(11, '', 'rue de mulhouse', '68400', 'Riedisheim');


$jon = new Client('JJ', 'Jon', $datedenaissance, 1, $adresse);

var_export($jon);