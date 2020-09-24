<?php
				// Curl setup
				$mnxdb_url = "https://medinexo.caspio.com/rest/v2/tables/MNX_Currencies/records?q.select=Currency_Name%2CCurrency_Alphabetic_Code%2CCurrency_Numeric_Code%2CCurrency_USD_Exchange%2C";
				
				// echo "uso este url para el curl:",$mnxdb_url;
				$ch = curl_init();
				// Set curl options
				curl_setopt($ch, CURLOPT_URL,$mnxdb_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
				// Setup curl header
				$headr = array();
				// This parameter is for POST, PUT and DELETE 
				//$headr[] = 'Content-Type: application/json';
				$headr[] = 'Accept: application/json';
				$headr[] = 'Authorization: Bearer '.$accesstoken;
				curl_setopt($ch, CURLOPT_HTTPHEADER,  $headr);

				//  Initiate curl
				$result=curl_exec($ch);
				// check for error 
				// var_dump($result); 
				if ($result === false)
					{
						// throw new Exception('Curl error: ' . curl_error($crl));
						print_r('Curl error: ' . curl_error($ch));
					}

				// Closing
				curl_close($ch);

				// Will dump a beauty json
				var_dump(json_decode($result, true));

?>