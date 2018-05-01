<?php

	class Blog extends CI_Controller {

		public function __construct()
        {
            parent::__construct();
            
            $this->load->helper('general');
			$this->load->model('State_model');
			$this->load->model('City_model');
			$this->load->model('Business_model');
			$this->load->model('Page_model');
			$this->load->library('pagination');
			$this->load->model('Configuration_model');
			
        }

        public function page($offset = 0) {

			$page = 'blog';
			$offset = $this->uri->segment(2, 0);
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			} else {
				//how many blogs will be shown in a page
		        $limit = 5;
		        
		        $result = $this->Page_model->get_blog_posts($limit, $offset);

		        $data['blogs'] = $result['data'];
		        $data['count'] = $result['count'];
		        
		        $config = array();
		        $config['base_url'] = site_url("blog");
		        $config['total_rows'] = $data['count'];
		        $config['per_page'] = $limit;

		        //which uri segment indicates pagination number
		        $config['uri_segment'] = 2;
		        $config['use_page_numbers'] = TRUE;

		        //max links on a page will be shown
		        $config['num_links'] = 4;

		        //various pagination configuration
		        $config['full_tag_open'] = '<nav><ul class="pager">';

		        $config['prev_tag_open'] = '<li>';
		        $config['prev_link'] = '&laquo;';
		        $config['prev_tag_close'] = '</li>';

		        $config['cur_tag_open'] = '<li class="active"><a href="#"><strong>';
		        $config['cur_tag_close'] = '</strong></a></li>';

		        $config['num_tag_open'] = '<li>';
		        $config['num_tag_close'] = '</li>';

		        $config['next_tag_open'] = '<li>';
		        $config['next_link'] = '&raquo;';
		        $config['next_tag_close'] = '</li>';		        

		        $config['full_tag_close'] = '</ul></nav>';

		        $this->pagination->initialize($config);
		        $data['pagination'] = $this->pagination->create_links();

				$data['title'] = 'Blog | '.the_config('site_name').' - Unlocks Expert Services For YOU!';
				$data['meta_title'] = 'Blog | '.the_config('site_name');
				$data['meta_keyword'] = '';
				$data['meta_description'] = '';
				
				$this->load->view('templates/header', $data);
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer');

			}

		}

    }