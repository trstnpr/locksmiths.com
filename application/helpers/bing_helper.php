<?php
	function getPlacesAPI($data = null) {
		$app =& get_instance();
		$request = $app->bing->getData($data);
		if($request['status'] == 200) {
			$body = $request['body'];
			$items = array();
			foreach($body->places->value as $item) {
				$items[] = array(
					'id' => $item->id,
					'webSearchUrl' => $item->webSearchUrl,
					'name' => $item->name,
					'url' => (isset($item->url)) ? $item->url : NULL,
					'entityTypeHints' => $item->entityPresentationInfo->entityTypeHints,
					'address' => $item->address,
					'phone' => (isset($item->telephone)) ? $item->telephone : NULL
				);
			}
			if(isset($body->places)) {
				$response = $items;
				return $response;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function address_proper($data) {
		return $data->postalCode.' '.$data->addressLocality.', '.$data->addressRegion;
	}

	function getLocation($data) {
		$app =& get_instance();
		$request = $app->googlemap->getGeoCode($data);
		if($request['status'] == 200) {
			$response = $request['body']->results[0]->geometry->location;
			return $response;
		} else {
			return FALSE;
		}
	}