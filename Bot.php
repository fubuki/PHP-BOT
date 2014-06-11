<?php

Class Bot 
{
	private $agent = '';

	public function __construct()
 	{
 
  	}

  	/**
  	 * 計算從一個網頁到另外一個網頁路徑
  	 * @param  string $start 
  	 * @param  string $end
  	 * @return [type]
  	 */
	public function urlWalkPath($start, $end)
	{


	}

	/**
	 * 取得一個網頁裡所有連結
	 * @param  string $url
	 * @return array
	 */
	public function getContent($url)
	{
		$return_array = array();
		$ch = curl_init();
		$ref = '';
		$CURL_TIMEOUT = 2;

		$header = array(
			"Content-type: text/html; charset=utf-8", 
		);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_TIMEOUT, $CURL_TIMEOUT);    // Timeout
		curl_setopt($ch, CURLOPT_USERAGENT, $this->agent);   // Webbot name
		curl_setopt($ch, CURLOPT_URL, $url);             // Target site
		curl_setopt($ch, CURLOPT_HTTPGET, TRUE);   
		curl_setopt($ch, CURLOPT_ENCODING , "");       
		curl_setopt($ch, CURLOPT_VERBOSE, FALSE);           // Minimize logs
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // No certificate
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);     // Follow redirects
		curl_setopt($ch, CURLOPT_MAXREDIRS, 4);             // Limit redirections to four
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);     // Return in string
    
    	$return_array['FILE']   = curl_exec($ch); 
   		$return_array['STATUS'] = curl_getinfo($ch);
   		$return_array['ERROR']  = curl_error($ch);
   
  		curl_close($ch);
  		return $return_array;
	}

	/**
	 * 取出html裡面所有連結
	 * @param  [type] $content
	 * @return [type]
	 */
	public function parserUrl($content)
	{
		$urlList = array();
		$html = new DOMDocument();
		$html->loadHTML($content);
		$tags = $html->getElementsByTagName('a');
		foreach ($tags as $key => $value) {
			$urlList[] = array('href' =>$value-> getAttribute('href') ,
								'title'=>$value-> getAttribute('title'));	
		}
		return $urlList;
	}

	/**
	 * 找出連結跟其他連結之間的相關性
	 * @param  string $url
	 * @param  array $entity
	 * @return [type]
	 */
	public function compareUrlSimilar($url, $entity)
	{


	}


	/**
	 * 利用exec呼叫wordnet
	 * @param  [type] $word [description]
	 * @return [type]       [description]
	 */
	public function callWordNet($word)
	{
		$result = shell_exec('/usr/bin/wn '.$word.' -synsn');

	}


}
