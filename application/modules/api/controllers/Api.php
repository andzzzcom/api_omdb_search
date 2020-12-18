<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Api extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	private function api_find_movie($data)
	{
		$url 		 = 	'http://www.omdbapi.com/?&apikey=';
		$key 		 = 	'';
		$param		 =	'&s='.$data;
		$url_api	 = 	$url.$key.$param;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url_api);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,2);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$result = json_decode(curl_exec($ch));
		curl_close($ch);
		
		if (empty($result)){
			return false;
		}
		else{
			return ($result);
		}
	}
	
	private function api_find_detail_movie($data)
	{
		$url 		 = 	'http://www.omdbapi.com/?&apikey=';
		$key 		 = 	'';
		$param		 =	'&i='.$data.'&Plot=Full';
		$url_api	 = 	$url.$key.$param;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url_api);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,2);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$result = json_decode(curl_exec($ch));
		curl_close($ch);
		
		if (empty($result)){
			return false;
		}
		else{
			return ($result);
		}
	}
	
	public function index()
	{
		/*
		$result = $this->api_access();
		
		echo"<pre>";
		print_r($result);
		echo"</pre>";
		
		*/
		
		$data["data"] = '';
		$this->load->view("Home_v", $data);
		
	}
	
	public function api()
	{
		$tes = urlencode($this->input->get()["q"]);
		$result = $this->api_find_movie($tes);
		
		$array_movie = array();
		if($result->Response !== 'False')
		{
			foreach($result->Search as $r)
			{
				$imdbID = $r->imdbID;
				$detail_result = $this->api_find_detail_movie($imdbID);
				
				$array_detail = array(
							"imdbID"=>$imdbID,
							"detail"=>$detail_result
						);
				array_push($array_movie, $array_detail);
			}
		}
		
		/*
		echo"<pre>";
		print_r($result);
		echo"</pre>";
		*/
		
		$data["array_movie"] = $array_movie;
		$data["data"] = $result;
		$this->load->view("Home_v", $data);
		
		
	}
}
