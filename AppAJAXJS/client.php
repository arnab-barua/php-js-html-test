<?php

/**
* 
*/
class Client
{
	
	function __construct()
	{
		$params = $arrayName = array('location' =>'http://belief-it.com/appuser/server.php' ,
			'uri' => 'urn://http://belief-it.com/appuser/server.php',
			'trace' => 1);

		$this->instance = new SoapClient(NULL, $params);
	}

	public function getName($id_arr)
	{
		return $this->instance->__soapCall('getUserName',$id_arr);
	}

	public function getPass($id_arr)
	{
		return $this->instance->__soapCall('getPassword',$id_arr);
	}

	public function getPlace($id_arr)
	{
		return $this->instance->__soapCall('getLocation',$id_arr);
	}
}

$client = new Client;

$id_arr = array('id' =>'1');
echo 'Username: ';
echo $client->getName($id_arr);
echo "<br><br>";
echo 'Password: ';
echo $client->getPass($id_arr);
echo "<br><br>";
echo 'Location: ';
echo $client->getPlace($id_arr);
?>