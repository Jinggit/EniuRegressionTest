<?php
/**
 *
 * $Author:  Guanhua Jing()
 * $Id:  $
*/

require_once(dirname(__FILE__) . '/Base.php');

class MySMS extends Base
{

	
    public function __construct() 
    {
     parent::__construct();
    }

    public function index()
    {
		$this->mysms();
    }

	public function mysms()
		{
        //setup PHP UTF-8 stuff
		setlocale(LC_CTYPE, 'en_US.UTF-8');
		mb_internal_encoding("UTF-8");
		mb_http_output('UTF-8');


	//read parameters from HTTP Get URL
	$phone = $_GET["phone"];
	$smscenter = $_GET["smscenter"];
	$text_utf8 = rawurldecode($_GET["text"]);

	//if parameters are not present in HTTP url, they can be also present in HTTP header
	$headers = getallheaders();
	if (empty($phone)) {
			$phone = $headers["phone"];
	}
	if (empty($smscenter)) {
			$smscenter = $headers["smscenter"];
	}
	if (empty($text_utf8)) {
			$text_utf8 = rawurldecode($headers["text"]);
	}
		log_message('INFO', "$text_utf8,$phone,$smscenter", false, true);
        $params = array(
		'msg' => $text_utf8,
		'phone' => $phone,
		'smscenter' => $smscenter
        );
        //$this->adminShow('mysms.htm', $params, false);
    }	
}
?>
