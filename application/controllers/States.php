<?php

	class States extends CI_Controller {

		public function __construct()
        {
                parent::__construct();
                
				$this->load->model('State_model');
				$this->load->model('City_model');
				$this->load->model('Configuration_model');
        }

		public function loadstates() {
			
			$offset = $this->input->post('row');

			$limit = 12;

			$data['states'] = $this->State_model->get_few_offset_states($offset, $limit);

			$html = '';

			foreach($data['states'] as $state){

			    $html .= '<div class="col-md-4 col-sm-6 state-item">';
			    $html .= '<a href="'.base_url('state/'.strtolower($state->abbrev)).'" class="list-state">';
			    $html .= '<i class="fa fa-location-arrow"></i> '.$state->state;
			    $html .= '</a>';
			    $html .= '</div>';

			}

			echo $html;

		}

		public function loadcities() {

			$state = $this->input->post('state');
			
			$offset = $this->input->post('row');

			$limit = 12;

			$data['cities'] = $this->City_model->get_few_offset_cities_from_state($state, $offset, $limit);

			$html = '';

			foreach($data['cities'] as $city) {

			    $html .= '<div class="col-md-4 col-sm-6 city-item">';
			    $html .= '<a href="'.base_url('city/'.$city->slug).'" class="list-state">';
			    $html .= '<i class="fa fa-location-arrow"></i> '.$city->name;
			    $html .= '</a>';
			    $html .= '</div>';

			}

			echo $html;

		}

	}