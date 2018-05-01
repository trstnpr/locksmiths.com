<?php

	function globaldata() {

		$api_host = 'http://api2.yp.com/listings/v1/';
		$api_key = 'key=fmxln38wdp';
		$api_format = 'format=json';
		$api_term = 'term=locksmith';

		$data = array(
				'api_host' => $api_host,
				'api_key' => $api_key,
				'api_format' => $api_format,
				'api_term' => $api_term
			);

		return $data;

	}

	function search($location) {

		$data = globaldata();

		$term = $data['api_term'];
		$searchloc = 'searchloc='.preg_replace('/\s+/', '%20', $location);
		$format = $data['api_format'];
		$api_host = $data['api_host'];
		$api_key = $data['api_key'];
		$endpoint = 'search?';
		$listingcount = 'listingcount=10';
		$user_agent = 'useragent=Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10_8_5%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F31.0.1650.63+Safari%2F537.36';

		$request_url = $api_host.$endpoint.$format.'&'.$api_key.'&'.$term.'&'.$searchloc.'&'.$user_agent.'&'.$listingcount;

		$ch = curl_init($request_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch,CURLOPT_USERAGENT, $user_agent);
		$result = curl_exec($ch);
		curl_close($ch);


		if($result !== false) {
			$json = json_decode($result);
			$response = array('result' => 'success', 'data' => $json);
		} else {
			$response = array('result' => 'error', 'message' => 'Api Request Error');
		}

		return $response;
	}

?>