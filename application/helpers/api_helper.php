<?php
	function getDataApi($data = null) {
		$app =& get_instance();
		$request_api = $app->foursquare->getBusiness($data);

		if($request_api['status'] == 200) {
			if($request_api['body']->meta->code == 200) {
				$items = array();
				foreach($request_api['body']->response->groups[0]->items as $item) {
					$categories = array();
					foreach($item->venue->categories as $category) {
						$categories[] = $category->name;
					}
					$items[] = array(
						'id' => $item->venue->id,
						'name' => $item->venue->name,
						'location' => array(
							'address' => (isset($item->venue->location->address)) ? $item->venue->location->address : 'No Given Data',
							'city' => $item->venue->location->city,
							'state' => $item->venue->location->state,
							'zipcode' => (isset($item->venue->location->postalCode)) ? $item->venue->location->postalCode : NULL,
							'country' => $item->venue->location->cc,
							'coordinates' => array(
								'latitude' => $item->venue->location->lat,
								'longitude' => $item->venue->location->lng
							)
						),
						'photos' => getImagesApi($item->venue->id),
						'categories' => $categories
					);
				}
				$response = array(
					'results' => (isset($request_api['body']->response->groups[0]->items)) ? count($request_api['body']->response->groups[0]->items) : 0,
					'geocode' => [
						'where' => $request_api['body']->response->geocode->where,
						'latitude' => $request_api['body']->response->geocode->center->lat,
						'longitude' => $request_api['body']->response->geocode->center->lng
					],
					'items' => (isset($items)) ? $items : NULL
				);
				return $response;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function getImagesApi($id = null) {
		$app =& get_instance();

		$request_api = $app->foursquare->getImages($id);
		if($request_api['status'] == 200) {
			if($request_api['body']->meta->code == 200) {
				$photos = $request_api['body']->response->photos->items;
				$gallery = array();
				foreach($photos as $item) {
					$gallery[] = $item->prefix.$item->width.'x'.$item->height.$item->suffix;
				}
				$primary = ($request_api['body']->response->photos->count != 0) ? $photos[0]->prefix.$photos[0]->width.'x'.$photos[0]->height.$photos[0]->suffix : NULL;
				$response = array(
					'count' => $request_api['body']->response->photos->count,
					'primary' => $primary,
					'gallery' => $gallery
				);
				return $response;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}