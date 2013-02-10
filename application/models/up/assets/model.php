<?php

class Models_Up_Assets_Model extends Models_Up {

	public function extract_video_id_from_youtube_url($youtubeurl) {
		
		if(strlen($youtubeurl)) {
			
			//** TAKEN FROM http://stackoverflow.com/questions/3392993/php-regex-to-get-youtube-video-id
			parse_str( parse_url( $youtubeurl, PHP_URL_QUERY ) );
			return $v;

		}
	
	}
	
	
	public function get_thumbnail_from_youtube_video_id($video_id){
		
		//http://stackoverflow.com/questions/6808013/get-the-youtube-video-thumbnail-from-youtube-video-url-using-php
	
		$thumbnail_array[0] = "http://img.youtube.com/vi/";
		$thumbnail_array[1] = $video_id;
		$thumbnail_array[2] = "/0.jpg";
		return $thumbnail_array[0].$thumbnail_array[1].$thumbnail_array[2];
	}
	
	
	public function getVideoDataFromYouTube( $youtube_id ){
		
		$this->db = new Models_Db_Assets_Model;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://gdata.youtube.com/feeds/api/videos/". $youtube_id . '?v=2&alt=jsonc' );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		return $this->db->object_to_array(json_decode($response));	
		
	}

}
