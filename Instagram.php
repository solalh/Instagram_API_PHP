<?php

class Instagram {
	
	
	private $endpoint;
	private $client_id;

	public function __construct($client_id, $endpoint)
	{
		$this->client_id = $client_id;
		$this->endpoint = $endpoint;
	}
	
	//private methode to call the API using curl 
	private function callAPI($url)
	{
		try{
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			$data = curl_exec($curl);
			
		} catch(Exception $e){
			throw new Exception($e->getMessage());
		}
		
		return $data;
	}
	
	//Methode construct the url, this methode uses callAPI to get the data 
	//Then parse data using Json decode
	public function getRecentMedia($user_name, $limit=12)
	{
		
		$data = $this->callAPI($this->endpoint . "tags/$user_name/media/recent?client_id={$this->client_id}&count=$limit");
		$json = json_decode($data);
		
		if($json->meta->code != 200){
			throw new Exception($json->meta->error-message, $json->meta->code);
		}
		
		return $json->data;
	}
}
