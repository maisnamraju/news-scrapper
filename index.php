<?php
	
	date_default_timezone_set('Asia/Beirut');

	error_reporting(E_ALL);
    
    ini_set('display_errors', 1);
    
	header('Content-Type: text/html; charset= Windows-1256');

	require 'vendor/autoload.php';

	use Goutte\Client;

	$client = new Client();	

	$lebanonfiles = $client->request('GET', 'http://www.lebanonfiles.com');

	$news_container = $lebanonfiles->filter('#mcs4_container .line');

	$news_container->each(function($node) {	
				
		$temp = explode(' ',trim($node->text()));

		$db = new MysqliDb (Array (
				                'host' => 'localhost',
				                'username' => 'root', 
				                'password' => 'rolemodel',
				                'db'=> 'wade3',
				                'charset' => 'cp1256'));

				
		$temp_time = date('Y-m-d H:i:s', strtotime($temp[0]));

		$temp_text = str_replace($temp[0]," ",$node->text());

		$temp_url = "http://www.lebanonfiles.com";
		
		$data = Array(
				'updated' => $temp_time,
				'scraped_on' => $temp_time,
				'link' =>$temp_url,
				'title'=> $temp_text,
				'feedsource' => 'lebanonfiles'
			);		

		$db->insert('news', $data );

	});


/*	$elnashra = $client->request('GET', 'http://www.elnashra.com');

	$elnashra_container1 = $elnashra->filter('#9 ul.listnews li');

	$elnashra_container2 = $elnashra->filter('#7 ul.listnews li');

	$elnashra_container1->each(function($node,$con){

		$feedsource = "elnashra";

		$temp_url = utf8_decode($node->filter('a')->attr('href'));

		$temp_time = strtotime($node->filter('label')->text());		

		$temp_time = date('Y-m-d H:i:s', $temp_time);

		$temp_text = $node->filter('div+a')->text();		

		$db = new MysqliDb (Array (
			                'host' => 'localhost',
			                'username' => 'root', 
			                'password' => 'rolemodel',
			                'db'=> 'wade3',
			                'charset' => 'c1256'));
			$data = Array(
			'updated' => $temp_time,
			'scraped_on' => $temp_time,
			'link' =>$temp_url,
			'title'=> $temp_text,
			'feedsource' => $feedsource
		);		

		$db->insert('news', $data );
			
	});	

	$elnashra_container2->each(function($node){

		$feedsource = "elnashra";

		$temp_url = utf8_decode($node->filter('a')->attr('href'));
						
		$temp_time = strtotime($node->filter('label')->text());

		$temp_time =date('Y-m-d H:i:s', $temp_time);

		$temp_text = $node->filter('div+a')->text();		

				$db = new MysqliDb (Array (
			                'host' => 'localhost',
			                'username' => 'root', 
			                'password' => 'rolemodel',
			                'db'=> 'wade3',
			                'charset' => 'c1256'));
			$data = Array(
			'updated' => $temp_time,
			'scraped_on' => $temp_time,
			'link' =>$temp_url,
			'title'=> $temp_text,
			'feedsource' => $feedsource
		);		

		$db->insert('news', $data );
								
	});
*/
?>
