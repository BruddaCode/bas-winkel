<?php

	class meid {
	
		public function validateNewSession($meid_user_key){

			$ch = curl_init();

			$meid_api_request = "https://www.enthix.net/meid/api/v1/getUser.php?token=" . $meid_secret_key . "&user=" . $meid_user_key;

			curl_setopt($ch, CURLOPT_URL, $meid_api_request);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$meid_api_raw_data = curl_exec($ch);
			$meid_api_data = json_decode($meid_api_raw_data);
			
			$info = curl_getinfo($ch);

			if($info['http_code'] !== 200) {    
				return 3;
			}
			
			if($meid_api_data->status == 200){
				return 1;
			}
			
			return 0;
			
			
		}
		
		public function generateLoginUrl(){
			return "https://www.enthix.net/meid/oauth/index.php?client_id=" . $meid_client_id;
		}
		
		
		
	}
?>
