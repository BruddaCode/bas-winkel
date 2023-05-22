<?php


class MeID
{

	private $client_id = "";
	private $client_token = "";

	public function __construct($id, $token)
	{
		$this->client_id = $id;
		$this->client_token = $token;
	}

	public function validateNewSession()
	{
		if (!isset($_GET['access_code']) || $_GET['access_code'] === "") {
			echo "Access code not set!";
			exit;
		}

		if (!isset($_GET['expiry']) || $_GET['expiry'] === '') {
			echo "Expiry not set!";
			exit;
		}

		if (!isset($_GET['user_id']) || $_GET['user_id'] === '') {
			echo "User ID not set!";
			exit;
		}


		$access_code = $_GET['access_code'];
		$expiry = $_GET['expiry'];
		$user_id = $_GET['user_id'];

		$url = 'https://enthix.net/meid/oauth/get_access_token.php';

		$post_data = array(
			'client_id' => $this->client_id,
			'client_secret' => $this->client_token,
			'access_code' => $access_code,
			'user_id' => $user_id
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$res = curl_exec($ch);

		$json_res = json_decode($res, true);

		$access_token = $json_res['access_token'];
		$refresh_token = $json_res['refresh_token'];
		$expiry = $json_res['expiry'];

		if (!isset($access_token) || !isset($refresh_token) || !isset($expiry)) {
			return 0;
		} else {
			$_SESSION["jp_login"] = $access_token;
			return 1;
		}


	}

	public function validateCurrentSession($meid_user_key)
	{
		$ch = curl_init();

		$meid_api_request = "https://www.enthix.net/meid/api/v1/getUser.php?client_secret=" . $this->client_token . "&access_token=" . $meid_user_key;

		curl_setopt($ch, CURLOPT_URL, $meid_api_request);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$meid_api_raw_data = curl_exec($ch);
		$meid_api_data = json_decode($meid_api_raw_data);

		$info = curl_getinfo($ch);

		if ($info['http_code'] !== 200) {
			return 3;
		}

		if ($meid_api_data->status == 200) {
			return $meid_api_raw_data;
		}

		return false;


	}

	public function generateLoginUrl()
	{
		return "https://www.enthix.net/meid/oauth/index.php?client_id=" . $this->client_id;
	}



}
?>
