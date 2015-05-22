<?php


class CountryClass{
	
	private $continents=array(); 
	
	public function __construct(){
		$this->continents = array('6255146'=>'Africa', '6255152'=>'Antarctica','6255147'=>'Asia',
		'6255148'=>'Europe','6255151'=>'Oceania','6255150'=>'South America');
	}
	
	public function getStatesId(){
		
		$url="http://www.geonames.org/childrenJSON?geonameId=6255152&callback=listPlaces&style=long&noCacheIE=1432259023709";
		//  Initiate curl
		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$url);
		// Execute
		$result=curl_exec($ch);
		// Closing
		
		$result = str_replace(array('listPlaces(',');'),'',$result);
		var_dump($result);
		
		
		// Will dump a beauty json :3
		echo json_decode($result, true);
		curl_close($ch);
		
	}
}
