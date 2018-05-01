<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Foursquare {

		public function __construct() {
			// API Credentials
			$this->api = array(
				'endpoint' => 'https://api.foursquare.com/v2/',
				'client_id' => 'WRWC1ZTPCU33QUWFBDOU3QWZICFGLQSKKWO1REOBGOCJTWN4',
				'client_secret' => 'BZ0JEWOOUGSRNK0VYAUHSCTRHZAWT10J0H4LYDVNVDAMRCXX',
				'oauth_token' => 'SBRCXTSA4THBVEWBNMUEIJ4FN03B1ASKZ4PA3DLMEJ1F0ECJ',
				'version' => '20180425'
			);
			// Api init
			$this->client = new \GuzzleHttp\Client([
	            'base_uri' => $this->api['endpoint'],
	            'http_errors' => false,
	            'headers' => [
				    'Content-Type' => 'application/json',
				    'Accept' => 'application/json',
				],
				'auth' => array($this->api['client_id'], $this->api['client_secret'])
	        ]);
		}

		public function getBusiness($data = null) {
			$endpoint = 'venues/explore';
			$params = array(
				'v' => $this->api['version'],
				'near' => (isset($data)) ? $data : 'Los Angeles, CA',
				'query' => 'locksmith',
				'venuePhotos' => 1
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

		public function getImages($id) {
			$endpoint = 'venues/'.$id.'/photos';
			$params = array(
				'oauth_token' => $this->api['oauth_token'],
				'v' => $this->api['version']
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

		public function test() {
			return $this->api;
		}

	}