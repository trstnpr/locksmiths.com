<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class GoogleMap {

		public function __construct() {
			$this->app =& get_instance();
			$this->app->load->helper('general');

			// API Credentials
			$this->api = array(
				'endpoint' => 'https://maps.googleapis.com/maps/api/',
				'key' => the_config('gmap_static_apikey'),
			);
			// Api init
			$this->client = new \GuzzleHttp\Client([
	            'base_uri' => $this->api['endpoint'],
	            'http_errors' => false,
	            'headers' => [
				    'Content-Type' => 'application/json',
				    'Accept' => 'application/json'
				]
	        ]);
		}

		public function getGeoCode($data) {
			$endpoint = 'geocode/json';
			$params = array(
				'address' => $data,
				'key' => $this->api['key'],
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