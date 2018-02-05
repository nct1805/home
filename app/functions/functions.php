<?php
	function fewchars($s,$lenght) 
	{
	  if ($s=='' || $s==NULL) return $s;
	if (is_array($s)) return $s;
	$s = strip_tags(trim($s));
		if(strlen($s) >= $lenght  && ($espacio = strpos($s, " ", $lenght ))) {
	$s = substr($s, 0, $espacio).'...';
		}
	return $s;
	}
	function currency($str){
	$s="";
	for($i = 1; $i<=strlen($str); $i++){
		if($i%3==0&&$i<strlen($str))
			$s = ".".$str[strlen($str)-$i].$s;
		else
			$s = $str[strlen($str)-$i].$s;
	}
		return $s;

	}
	function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
	function ceo($str){	
		$chars = array(
	        ''  =>  array('.','"','\'','  ',' -','- ',':','?','~','!','@','#','$','%','*',';',',','&','(',')'),
	        '-' =>  array(' ','  ','#','@','!','#','-','/'),
			'a'	=>	array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă','A'),
			'e' =>	array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê','E'),
			'i'	=>	array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị','I'),
			'o'	=>	array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ','O'),
			'u'	=>	array('U','ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
			'y'	=>	array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ','Y'),
			'd'	=>	array('đ','Đ','D'),
			'b'=>array('B'),
			'c'=>array('C'),
			'f'=>array('F'),
			'g'=>array('G'),
			'h'=>array('H'),
			'j'=>array('J'),
			'k'=>array('K'),
			'l'=>array('L'),
			'm'=>array('M'),
			'n'=>array('N'),
			'p'=>array('P'),
			'q'=>array('Q'),
			'r'=>array('R'),
			's'=>array('S'),
			't'=>array('T'),
			'v'=>array('V'),
			'x'=>array('X'),
			'z'=>array('Z'),
			'w'=>array('W'),
	 	);

		foreach ($chars as $key => $arr) 
			foreach ($arr as $val)
				$str = str_replace($val,$key,$str);
		return $str;
	}
	function get_base_url() {

	    $protocol = filter_input(INPUT_SERVER, 'HTTPS');
	    if (empty($protocol)) {
	        $protocol = "http";
	    }

	    $host = filter_input(INPUT_SERVER, 'HTTP_HOST');

	    $request_uri_full = filter_input(INPUT_SERVER, 'REQUEST_URI');
	    $last_slash_pos = strrpos($request_uri_full, "/");
	    if ($last_slash_pos === FALSE) {
	        $request_uri_sub = $request_uri_full;
	    }
	    else {
	        $request_uri_sub = substr($request_uri_full, 0, $last_slash_pos + 1);
	    }

	    return $protocol . "://" . $host . $request_uri_sub;

	}
?>