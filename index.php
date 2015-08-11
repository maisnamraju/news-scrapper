<?php
	
	date_default_timezone_set('Asia/Beirut');

	error_reporting(E_ALL);
    
    ini_set('display_errors', 1);

	header('Content-Type: text/html; charset= Windows-1256');

	require 'vendor/autoload.php';

	include 'config.php';

	use Goutte\Client;

	$client = new Client();
	
	/*$lebanonfiles = $client->request('GET', 'http://www.lebanonfiles.com');

	$news_container = $lebanonfiles->filter('#mcs4_container .line');

	$news_container->each(function($node) {	
		
		$temp = explode(' ',trim($node->text()));
				
		$temp_time = strtotime($temp[0]);

		$temp_text = utf8_decode(str_replace($temp[0]," ",$node->text()));

		$temp_url = "http://www.lebanonfiles.com";
	
	});*/

/*	$elnashra = $client->request('GET', 'http://www.elnashra.com');

	$elnashra_container1 = $elnashra->filter('#9 ul.listnews li');

	$elnashra_container2 = $elnashra->filter('#7 ul.listnews li');

	$elnashra_container1->each(function($node,$con){

		$feedsource = "elnashra";

		$temp_url = utf8_decode($node->filter('a')->attr('href'));

		$temp_time = strtotime($node->filter('label')->text());		

		$temp_text = utf8_decode($node->filter('div+a')->text());
			
		$con->query("INSERT INTO news (updated, scraped_on, link, title, feedsource) VALUES
			 ('" . $temp_time . "', '" . $temp_time . "', '" . $temp_url . "', '" . $temp_text . "', '".$feedsource."')");
					
	});	
*/
	$elnashra_container2->each(function($node){

		$feedsource = "elnashra";

		$temp_url = utf8_decode($node->filter('a')->attr('href'));
						
		$temp_time = strtotime($node->filter('label')->text());

		$temp_text = utf8_decode($node->filter('div+a')->text());		
					
	});

?>
