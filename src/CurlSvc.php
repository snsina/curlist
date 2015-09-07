<?php
namespace Snsina\Curlist

/**
 * 
 * @author snam
 *
 */
class CurlSvc 
{
	
	public function get($url, array $params, array $headers = array())
	{
		$options = array(
				'CURLOPT_URL' => $url . $this->proceedGetOptions($params), 
		);
		
		$options = array_merge($options, $this->commonOptions());
		
		if(!empty($headers)) {
				$options = array_merge($options, $this->setHeaders($headers));
		}
		
		$result = $this->sendReceive($options);
		
		return $result;
	}
	
	public function post($url, array $params, array $headers = array())
	{
		$options = array(
				'CURLOPT_URL' 	=> $url,
				'CURLOPT_POST'		=> true,
				'CURLOPT_POSTFIELDS'	=> $params,
		);
		
		$options = array_merge($options, $this->commonOptions());
		
		if(!empty($headers)) {
			$options = array_merge($options, $this->setHeaders($headers));
		}
		
		$result = $this->sendReceive($options);

		return $result;
	}	
	
	protected function setHeaders($headers)
	{
		return array(
				'CURLOPT_HTTPHEADER' => $headers,
		);
	}
	
	protected function proceedGetOptions(array $params)
	{
		$query = '';
		foreach($params as $key => $value) {
			if(empty($query)) {
				$query .= "?{$key}={$value}";
			} else {
				$query .= "&{$key}={$value}";
			}
		}
		return $query;
	}

	protected function commonOptions()
	{
		return array(
				'CURLOPT_AUTOREFERER' 	=> true,
				'CURLOPT_RETURNTRANSFER'	=> true,				
		);		
	}
	
	protected function sendReceive($options)
	{  
		$ch = curl_init();
		
		foreach ($options as $key => $value) {
			curl_setopt($ch, constant($key), $value);
		}
		$result = curl_exec($ch);
		curl_close($ch);
				
		return $result;
	}	
	
}
