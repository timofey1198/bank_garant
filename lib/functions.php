<?
	
	function getInfo($url, $text){
		
		include_once('simple_html_dom.php');
	
		$url_final = 'http://zakupki.gov.ru/epz/order/notice/printForm/view.html?regNumber='.$url;
		//$url_final = 'http://zakupki.gov.ru/223/purchase/public/purchase/info/common-info.html?regNumber='.$url;
		$c = curl_init($url_final);
		
		curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36');
		curl_setopt($c, CURLOPT_HEADER, false);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
		
		$plain = curl_exec($c);
		
		$html = new simple_html_dom();
		$html->load($plain);
		
		//echo '<code>'.$plain.'</code>';
		
		//echo $html->find('td')[0];
		
		//echo $text;
		
		//$text = str_replace(" ","",$text);
		
		foreach($html->find('td') as $key => $value){
			//echo 'key: '.$key.'; value: '.$value->plaintext;
			
			if($value->plaintext == $text){
				$result = $html->find('td')[$key+1]->plaintext;
			}
			
		}
		
		return $result;
		
	}
	
?>