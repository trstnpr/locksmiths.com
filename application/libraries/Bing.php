<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Bing {

		public function __construct() {
			// API Credentials
			$this->api = array(
				'endpoint' => 'https://api.cognitive.microsoft.com/',
				'key' => '748125a32fdd4f558c8461f16c67018e',
				'mkt' => 'en-US'
			);
			// Api init
			$this->client = new \GuzzleHttp\Client([
	            'base_uri' => $this->api['endpoint'],
	            'http_errors' => false,
	            'headers' => [
				    'Content-Type' => 'application/json',
				    'Accept' => 'application/json',
				    'Ocp-Apim-Subscription-Key' => $this->api['key']
				]
	        ]);
		}

		public function getData($query) {
			$endpoint = 'bing/v7.0/entities';
			$params = array(
				'mkt' => $this->api['mkt'],
				'q' => $query,
				'responseFilter' => 'Places'
			);

			try {
				$request = $this->client->request('GET', $endpoint, [
					'query' => $params
				]);
		        $response = array(
		        	'status' => $request->getStatusCode(),
		        	'body' => json_decode($request->getBody())
		        );
		    } catch(\Exception $e) {
		    	$response = array(
	                'status' => 500,
	                'message' => 'Sorry! We can\'t process your application at the moment.'
	            );
		    }
	        return $response;
		}

	}