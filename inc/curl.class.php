<?php
class curl
{
	function get($url,$conf=array())
	{
		$data=file_get_contents($url);
		!$data && $data=$this->cevin_http_open($url,$conf);
		!$data && $data=$this->sw_http_open($url,$conf);
		return $data;
	}
	function post($url,$conf=array())
	{
		$conf['post']=1;
		$data=file_get_contents($url);
		!$data && $data=$this->cevin_http_open($url,$conf);
		!$data && $data=$this->sw_http_open($url,$conf);
		return $data;
	}
	function sw_http_open($url, $conf = array()) {      
		$return = '';      
		if(!is_array($conf))      
		{      
			return $return;      
		}      
		$matches = parse_url($url);      
		!isset($matches['host']) && $matches['host'] = '';      
		!isset($matches['path']) && $matches['path'] = '';      
		!isset($matches['query']) && $matches['query'] = '';      
		!isset($matches['port']) && $matches['port'] = '';      
		$host = $matches['host'];      
		$path = $matches['path'] ? $matches['path'].($matches['query'] ? '?'.$matches['query'] : '') : '/';      
		$port = !empty($matches['port']) ? $matches['port'] : 80;      
		 
		$conf_arr = array(      
			'limit'=>0,      
			'post'=>'',      
			'cookie'=>'',      
			'bysocket'=>FALSE,      
			'ip'=>'',      
			'timeout'=>15,      
			'block'=>TRUE,      
			);      
		 
		foreach (array_merge($conf_arr, $conf) as $k=>$v) ${$k} = $v;      
		 
		if($post) {      
			if(is_array($post))      
			{      
				$post = http_build_query($post);      
			}      
			$out = "POST $path HTTP/1.0\r\n";      
			$out .= "Accept: */*\r\n";      
			//$out .= "Referer: $boardurl\r\n";      
			$out .= "Accept-Language: zh-cn\r\n";      
			$out .= "Content-Type: application/x-www-form-urlencoded\r\n";      
			$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";      
			$out .= "Host: $host\r\n";      
			$out .= 'Content-Length: '.strlen($post)."\r\n";      
			$out .= "Connection: Close\r\n";      
			$out .= "Cache-Control: no-cache\r\n";      
			$out .= "Cookie: $cookie\r\n\r\n";      
			$out .= $post;      
		} else {      
			$out = "GET $path HTTP/1.0\r\n";      
			$out .= "Accept: */*\r\n";      
			//$out .= "Referer: $boardurl\r\n";      
			$out .= "Accept-Language: zh-cn\r\n";      
			$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";      
			$out .= "Host: $host\r\n";      
			$out .= "Connection: Close\r\n";      
			$out .= "Cookie: $cookie\r\n\r\n";      
		}      
		$fp = @fsockopen(($ip ? $ip : $host), $port, $errno, $errstr, $timeout);      
		if(!$fp) {      
			return '';      
		} else {      
			stream_set_blocking($fp, $block);      
			stream_set_timeout($fp, $timeout);      
			@fwrite($fp, $out);      
			$status = stream_get_meta_data($fp);      
			if(!$status['timed_out']) {      
				while (!feof($fp)) {      
					if(($header = @fgets($fp)) && ($header == "\r\n" ||  $header == "\n")) {      
						break;      
					}      
				}      
		 
				$stop = false;      
				while(!feof($fp) && !$stop) {      
					$data = fread($fp, ($limit == 0 || $limit > 8192 ? 8192 : $limit));      
					$return .= $data;      
					if($limit) {      
						$limit -= strlen($data);      
						$stop = $limit <= 0;      
					}      
				}      
			}      
			@fclose($fp);      
			return $return;      
		}      
	}


	function cevin_http_open($url, $conf = array())      
	{      
		if(!function_exists('curl_init') or !is_array($conf))  return FALSE;      
		 
		$post = '';      
		$purl = parse_url($url);      
		 
		$arr = array(      
			'post' => FALSE,      
			'return' => TRUE,      
			'cookie' => 'C:/cookie.txt',);      
		$arr = array_merge($arr, $conf);      
		$ch = curl_init();      
		 
		if($purl['scheme'] == 'https')      
		{      
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);      
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);      
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);      
		}      
		 
		curl_setopt($ch, CURLOPT_URL, $url);      
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, $arr['return']);      
		curl_setopt($ch, CURLOPT_COOKIEJAR, $arr['cookie']);      
		curl_setopt($ch, CURLOPT_COOKIEFILE, $arr['cookie']);      
		 
		if($arr['post'] != FALSE)      
		{      
			curl_setopt($ch, CURL_POST, TRUE);      
			if(is_array($arr['post']))      
			{      
				$post = http_build_query($arr['post']);      
			} else {      
				$post = $arr['post'];      
			}      
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);      
		}      
		 
		$result = curl_exec($ch);      
		curl_close($ch);      
		 
		return $result;      
	} 
}