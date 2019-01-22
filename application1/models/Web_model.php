<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_model extends CI_Model
{
	function slider_img(){
		$slider = $this->db->get('slider');
		return $slider->result();
	}

	function slider_insert($post){
		$curent_image = $_FILES["image"]["name"];

		$Caracteres = '123456789';
		$random = rand(0,$Caracteres);
	        
	        if (!empty($curent_image)) {

	    	$config['upload_path']          = './web_resource/slider/';
	        $config['allowed_types']        = 'jpg|png|JPG';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 1200;
	        $config['max_height']           = 700;
	        $config['file_name']           	= $random.'_'.$curent_image;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('image'))
	        {
	            return FALSE;
	        }else{

	        	$upload_data = $this->upload->data();
	        	$file_ext = $upload_data['file_ext'];

	        	$fields = array(
					'title' => $post['title'],
					'image' => $random.'_'.$curent_image
					);

				$this->db->insert('slider', $fields);
				return true;
	        }
        }
	}

	function slider_delete($id){

		$query = $this->db->get_where('slider', array('id' => $id));
        $slider = $query->first_row();
        $slider_image = $slider->image;

        if (file_exists(APPPATH.'../web_resource/slider/'.$slider_image))
	        {
	        	$path = APPPATH.'../web_resource/slider/'.$slider_image;
	        	
	            unlink($path);
	        }

		$this->db->where('id', $id);
		$this->db->delete('slider');
		return true;
	}

	function menu_insert($post){
		$this->db->insert('web_menu', array('menu_title' => $post['menu_title']));
		return true;
	}

	function menu_data(){
		$menu_data = $this->db->get('web_menu');
		return $menu_data->result();
	}

	function breaking_news_insert($post){
		$this->db->insert('breaking_news', array('news' => $post['news']));
		return true;
	}

	function breaking_news_view(){
		$breaking_news_view = $this->db->get('breaking_news');
		return $breaking_news_view->result();
	}

	function speech(){
		$speech = $this->db->get('speech');
		return $speech->result();
	}

	function speech_single($id){
		$query = $this->db->get_where('speech', array('id' => $id));
        return $query->first_row();
	}

	function speech_update($post){
		$curent_image = $_FILES["image"]["name"];
		$prev_image = $post['prev_image'];

		if ($curent_image>0) {
			if (file_exists(APPPATH.'../web_resource/speech/'.$prev_image))
	        {
	        	$path = APPPATH.'../web_resource/speech/'.$prev_image;
	        	
	            unlink($path);
	        }
	    
		    $config['upload_path']          = './web_resource/speech/';
	        $config['allowed_types']        = 'jpg|png|JPG';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 768;
	        $config['file_name']           	= $curent_image;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('image'))
	        {
	            return FALSE;
	        }else{

	        	$upload_data = $this->upload->data();
	        }
		}else{
			$curent_image=$prev_image;
		}

		$fields = array(
				'title' => $post['title'],
				'speech' => $post['speech'],
				'image' => $curent_image
			);
		$this->db->where(array('id' => $post['id']));
		$this->db->update('speech', $fields);

		return true;
	}

	function notice_insert($post){
		$this->db->insert('notice', $post);
		return true;
	}

	function notice(){
		$speech = $this->db->get('notice');
		return $speech->result();
	}

	function notice_delete($id){
		$this->db->where('id', $id);
		$this->db->delete('notice');
		return true;
	}

	function single_notice($id){
		$query = $this->db->get_where('notice', array('id' => $id));
        return $query->first_row();
	}

	function photo_gallery(){
		$photo = $this->db->get('photo_gallery');
		return $photo->result();
	}

	function photo_gallery_web($limit, $offset){
		$photo = $this->db->select(['id','image'])
							->from('photo_gallery')
							->limit($limit, $offset)
							->get();
		return $photo->result();
	}

	function image_gallery_insert($post){
		$curent_image = $_FILES["image_gallery"]["name"];
	        
        if (!empty($curent_image)) {

	    	$config['upload_path']          = './web_resource/photo_gallary/';
	        $config['allowed_types']        = 'jpg|png|JPG';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 768;
	        $config['file_name']           	= $curent_image;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('image_gallery'))
	        {
	            return FALSE;
	        }else{

	        	$upload_data = $this->upload->data();
	        	// $file_ext = $upload_data['file_ext'];
	        }
        }
		
		$this->db->insert('photo_gallery', array('image' => $curent_image));
		return true;
	}

	function gallary_photo_delete($id){

		$query = $this->db->get_where('photo_gallery', array('id' => $id));
        $image_data = $query->first_row();

		if (file_exists(APPPATH.'../web_resource/photo_gallary/'.$image_data->image))
        {
        	$path = APPPATH.'../web_resource/photo_gallary/'.$image_data->image;
        	unlink($path);
        }
        $this->db->where('id', $id);
		$this->db->delete('photo_gallery');
		return true;
	}

	function photo_num_rows(){
		$photo = $this->db->get('photo_gallery');
		return $photo->num_rows();
	}

	function video_insert($post){

		// $curent_image = $_FILES["s_image"]["name"];
	        
	 //        if (!empty($curent_image)) {

		//     	$config['upload_path']          = './web_resource/video/';
		//         $config['allowed_types']        = 'mp4|png|JPG';
		//         $config['max_size']             = 500000;
		//         $config['file_name']           	= $image_name;

		//         $this->load->library('upload', $config);

		//         if ( ! $this->upload->do_upload('s_image'))
		//         {
		//             return FALSE;
		//         }else{

		//         	$upload_data = $this->upload->data();
		//         	$file_ext = $upload_data['file_ext'];
		//         }
	 //        }

		 //    $fields = array(
			// 	'video_link' => $video_name.".".$file_ext,
			// 	'video_title' => $post['video_title']
			// 	);
			$this->db->insert('video_gallery', $post);
			return true;
		
		
		
	}

	function video_list(){
		$video = $this->db->get('video_gallery');
		return $video->result();
	}

	function video_num_rows(){
		$photo = $this->db->get('video_gallery');
		return $photo->num_rows();
	}

	function video_gallery_web($limit, $offset){
		$photo = $this->db->select('*')
							->from('video_gallery')
							->limit($limit, $offset)
							->get();
		return $photo->result();
	}

	function breacking_news(){
		$breacking_news = $this->db->get('breaking_news');
		return $breacking_news->result();
	}
}