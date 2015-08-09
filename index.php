<?php 
	
	require 'vendor/autoload.php';

	use Goutte\Client;

	$client = new Client();

	$crawler = $client->request('GET', 'http://www.lebanonfiles.com');

	var_dump($crawler);

?>