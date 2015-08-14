<?php

class Instagram {
	
	private $client_id;
	private $user_name;
	private $limit;
	const INSTAGRAM_URL = "https://api.instagram.com/v1/";

	//Constructor
	public function __construct($client_id, $user_name, $limit)
	{
		$this->client_id = $client_id;
		$this->user_name = $user_name;
		$this->limit = $limit;
	}
	
	//Generate the login url
	//@return a String Instagram URL
	public function getEndpoint()
	{
		return self::INSTAGRAM_URL . "tags/{$this->user_name}/media/recent?client_id={$this->client_id}&count={$this->limit}";
	}
	
	//The call operator 
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
		
		curl_close($curl);
		
		return $data;
	}
	
	//Return the decoded data from json
	public function getDecodedData()
	{
		$endpoint = $this->getEndpoint();
		$data = $this->callAPI($endpoint);
		$json = json_decode($data);
		
		if($json->meta->code != 200){
			throw new Exception($json->meta->error-message, $json->meta->code);
		}
		
		return $json->data;
	}
	
	//Display the recent media of the user
	public function getRecentMedia(){
		try{
		
		$media = $this->getDecodedData();
		$htmlOutput = "";
		
		foreach($media as $medium){
			$htmlOutput .= "<div class='col-2'><img src='{$medium->images->thumbnail->url}'/></div>";
		}
		
		
		return $htmlOutput;
		
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
}
