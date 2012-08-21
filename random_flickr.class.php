<?php
class random_flickr{
	public static function getPics(){
		$flickr_vars = array(
			'method'			=> 'flickr.photos.getRecent',
			'api_key'			=> '4b6cbabbc5f06b02ab75741fd2a1343a',
			'format'			=> 'php_serial',
			'nojsoncallback'	=> 1
		);
		
		$flickr_curl = curl_init();
		
		curl_setopt($flickr_curl, CURLOPT_POST, 1);
		curl_setopt($flickr_curl, CURLOPT_POSTFIELDS, $flickr_vars);
		curl_setopt($flickr_curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($flickr_curl, CURLOPT_URL, 'http://api.flickr.com/services/rest/');
		
		$flickr_response = curl_exec($flickr_curl);
		curl_close($flickr_curl);
		
		$flickr_obj = unserialize( $flickr_response);
		if($flickr_obj[stat] = 'ok'){
			return $flickr_obj['photos']['photo'];
		}else{
			throw new Exception($flickr_obj['message']);
		}
	}
	
	public static function chooseRandom($arrPics){
		return $arrPics[array_rand($arrPics)];
	}
	
	public static function urlBuilder($image){
		/*
		 *	s	cuadrado pequeño 75x75
		 *	t	imagen en miniatura, 100 en el lado más largo
		 *	m	pequeño, 240 en el lado más largo
		 *	z	mediano 640, 640 en el lado más largo
		 *	b	grande, 1024 en el lado más largo*
		 */
		$size = 'z';
		$url = "http://farm".$image['farm'].".staticflickr.com/".$image['server']."/".$image['id']."_".$image['secret']."_".$size.".jpg";
		return $url;
	}
}