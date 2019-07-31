<?php
class Json {
	protected static $json 	= array(
						'status' 	=> 'fail',
						'data' 		=> '',
						'code' 		=> '',
						'message' 	=> 'Error indefinido'
					); 

	public static function setItem($index, $value) 
	{
		if ( ! isset(self::$json[ $index ]) ) 
		{
			self::$json[ $index ] = $value;
		}	
	}

	public static function setStatus($status)
	{
		self::$json['status'] = $status;
	}

	public static function setData($data)
	{
		self::$json['data'] = $data;
	}

	public static function setCode($code)
	{
		self::$json['code'] = $code;
	}

	public static function setMessage($message)
	{
		self::$json['message'] = $message;
	}

	public static function getJson()
	{
		return @json_encode(self::$json);
	}
}
