<?php
    function dump($data=null) {
        echo '<pre>';

        print_r($data);

        echo '</pre>';
    }

    function slugify($text){ 

        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        $text = trim($text, '-');

        $text = strtolower($text);

        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {

            return 'n-a-'.rand(1,99999);

        }

        return $text;

    }

    function star($star) {

        $raw_rate = $star;

        if($raw_rate == 5) {

            $rating = '
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            ';
            

        } else if($raw_rate == 4.5) {

            $rating = '
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            ';
            

        } else if($raw_rate == 4) {

            $rating = '
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            ';
            

        } else if($raw_rate == 3.5) {

            $rating = '
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o  "></i>
                <i class="fa fa-star-o"></i>
            ';
            

        } else if($raw_rate == 3) {

            $rating = '
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            ';
            

        } else if($raw_rate == 2.5) {

            $rating = '
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o  "></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            ';
            

        } else if($raw_rate == 2) {

            $rating = '
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            ';
            

        } else if($raw_rate == 1.5) {

            $rating = '
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o  "></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            ';
            

        } else if($raw_rate == 1) {

            $rating = '
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            ';
            

        } else if($raw_rate == 0.5) {

            $rating = '
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            ';
            

        } else {

            $rating = '
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            ';
            

        }


        return $rating.' ('.$star.')';

    }

    function status($data) {
        if($data == 1) {
            $status = 'pusblished';
        } else if($data == 2) {
            $status = 'draft';
        } else if($data == 3) {
            $status = 'trashed';
        }

        return $status;
    }

    function checked($data, $value) {
        if($data == $value) {
            $result = 'checked';
            return $result;
        }
    }

    function selected($data, $value) {
        if($data == $value) {
            $result = 'selected';
            return $result;
        }
    }

    function selected_multiple($data, $value) {
        if(unserialize($data) != NULL) {
            if(in_array($value, unserialize($data))) {
                $result = 'selected';
                return $result;
            }
        } else {
            return FALSE;
        }
    }

    function datetime_now() {
        return date('Y-m-d H:i:s');
    }

    function data_unserialize($data) {
        return unserialize($data);
    }

    function data_join($data) {
        return join(', ', $data);
    }

    function truncate($str, $width) {
        return strtok(wordwrap(strip_tags($str), $width, "...\n"), "\n");
    }
    function date_proper($data) {
        $date = date_create($data);
        return date_format($date, 'M d, Y');
    }
    function biz_status($data) {
        if($data == 0) {
            $status = 'pending';
        } else if($data == 1) {
            $status = 'verified';
        } else if($data == 2) {
            $status = 'voided';
        }

        return $status;
    }
    function biz_status_styled($data) {
        if($data == 0) {
            $status = '<label class="label label-warning">PENDING</label>';
        } else if($data == 1) {
            $status = '<label class="label label-success">VERIFIED</label>';
        } else if($data == 2) {
            $status = '<label class="label label-danger">VOIDED</label>';
        }

        return $status;
    }
    function biz_status_icon($data) {
        if($data == 0) {
            $status = '<i class="fa fa-exclamation-circle text-warning" title="Waiting to be confirmed."></i>';
        } else if($data == 1) {
            $status = '<i class="fa fa-check-circle text-success" title="Verified"></i>';
        } else if($data == 2) {
            $status = '<i class="fa fa-times-circle text-danger" title="Voided"></i>';
        }

        return $status;
    }
    function biz_action($data, $int) {

        if($data == $int) {

            $action = 'disabled';

        } else {

            $action = '';
        }

        return $action;

    }

    function biz_status_shade($data) {

        if($data == 0) {
            $status = 'warning';
        } else if($data == 1) {
            $status = 'success';
        } else if($data == 2) {
            $status = 'danger';
        }

        return $status;

    }

    function state($abbrev) {
        $CI =& get_instance();

        $states = $CI->State_model->get_state_from_abbrev($abbrev);

        foreach($states as $state) {
            $result = $state->state.' ('.$state->abbrev.')';
            return $result;
        }

    }

    function major_city($data) {

        if($data == 1) {

            $star = '<label class="label label-success">MAJOR CITY</label>';

        } else {

            $star = FALSE;

        }

        return $star;

    }

    function gr_keys() {
        $data = array(
            'site_key' => the_config('gr_site_key'),
            'secret_key' => the_config('gr_secret_key')
        );

        return $data;
    }

    function mail_config() {
        $data = array(
            'protocol' => 'smtp', 
            'smtp_host' => 'ssl://smtp.googlemail.com', 
            'smtp_port' => 465, 
            'smtp_user' => the_config('smtp_user'), 
            'smtp_pass' => the_config('smtp_password'),
            'mailtype' => 'html', 
            'charset' => 'iso-8859-1'
        );
        
        return $data;
    }

    function recent_my() { // -15 Days from Current Date
        $date = strtotime(date('M D, Y'));
        $newDate = date('M, Y',strtotime('-15 days',$date));

        return $newDate;
    }

    function strip_zip() {

        $data = array('/\#+\s\d\d/', '/\#+\d\d\d\d/', '/\#+\d\d\d/'); // pattern like '# 65', '#987', '#7898'

        return $data;
    }

    function clean_zip_list($string) { // For DB Put

        $trimSpace = trim($string, ' ');
        $trimComma = trim($trimSpace, ',');
        $dataSplit = preg_split('/,([\s])+/', $trimComma);
        $dataJoin = join($dataSplit, ', ');
        $data = trim($dataJoin, ', ');

        return $data;
    }

    function recent_blog($limit) {
        $CI =& get_instance();

        $model = $CI->Page_model->get_published_post($limit);

        if($model) {
            return $model;
        } else {
            return FALSE;
        }
    }

    function major_area() {
        $CI =& get_instance();

        $areas = $CI->City_model->get_popular_city();

        if($areas){
            return $areas;
        } else {
            return FALSE;
        }
        
    }

    function key_services() {
        $CI =& get_instance();
        $services = $CI->Page_model->get_key_services();
    
        return $services;
    }

    function the_config($key) {
        $CI =& get_instance();

        $model = $CI->Configuration_model->get_config_value_from_key($key);

        if($model){
            $config = reset($model);
            return $config->value;
        } else {
            return FALSE;
        }
        
    }
    
    function secure_url($url) { // SSL API EXTERNAL RESOURCES
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $data = str_replace('http://', 'https://', $url);
            echo $data;
        } else {
            return FALSE;
        }
    }

    function static_map($location, $size, $zoom) {
        $key = 'key='.static_map_key();
        $endpoint = 'https://maps.googleapis.com/maps/api/staticmap?zoom='.$zoom.'&size='.$size.'&scale=2&maptype=roadmap&sensor=false&language=en&markers=color:red|';
        $map = $endpoint.$location.'&'.$key;
        return $map;
    }

    function static_map_key() {
        $key = the_config('gmap_static_apikey');
        return $key;
    }