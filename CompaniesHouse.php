<?php

	/**
	*
        * @key private $_ApiKey = 'YOUR_COMPANIES_HOUSE_API_KEY';
        * @init require_once('CompaniesHouse.php');
        * @test $CompaniesHouse = new CompaniesHouse; var_dump($CompaniesHouse->company_profile('10131005'));
	*
	*/

	define('VERSION', '1.00');
	class Companies_House
	{
		private $_ApiKey 	= 	'YOUR_COMPANIES_HOUSE_API_KEY';
		private $_Endpoint 	= 	'https://api.companieshouse.gov.uk';
		
		/**
		* Search
		*
		* Query parameters:
		* @param (string) 	query - The term being searched for
		* @param (string)	type - Search in companies, officers or disqualified officers informations
		* Possible values are: companies (default), officers, disqualified-officers
		* @param (array)	query_string
		* 	@key (integer) items_per_page - The number of search results to return per page *optional*
		* 	@key (integer) start_index - The index of the first result item to return *optional*
		*
		* @return array
		*/
		
		public function search($query, $type = 'companies', $query_string = array())
		{
			$query_string = http_build_query($query_string);
			
			if(empty($query_string))
			{
				$query_string = '/' . $type . '?q=' . $query;
			}
			else
			{
				$query_string = '/' . $type . '?q=' . $query . '&' . $query_string;
			}
			
			$request = curl_init();
			curl_setopt($request, CURLOPT_URL, $this->_Endpoint . '/search' . $query_string);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($request, CURLOPT_USERPWD, $this->_ApiKey . ':');
			$result = curl_exec($request);
			$status = intval(curl_getinfo($request, CURLINFO_HTTP_CODE));
			curl_close($request);
			
			if($status==200)
			{
				return json_decode($result, true);
			}
			else
			{
				return false;
			}
		}
		
		/** 
		* Get the basic company information
		*
		* Query parameters: 
		* (string) company_number - The company number of the basic information to return
		*/
		
		public function company_profile($company_number)
		{
			$request = curl_init();
			curl_setopt($request, CURLOPT_URL, $this->_Endpoint . '/company/' . $company_number);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($request, CURLOPT_USERPWD, $this->_ApiKey . ':');
			$result = curl_exec($request);
			$status = intval(curl_getinfo($request, CURLINFO_HTTP_CODE));
			curl_close($request);
			
			if($status==200)
			{
				return json_decode($result, true);
			}
			else
			{
				return false;
			}
		}
		
		/** 
		* Get the current address of a company
		*
		* Query parameters: 
		* (string) company_number - The number of the company to create an address for
		*/
		
		public function company_address($company_number)
		{
			$request = curl_init();
			curl_setopt($request, CURLOPT_URL, $this->_Endpoint . '/company/' . $company_number . '/registered-office-address');
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($request, CURLOPT_USERPWD, $this->_ApiKey . ':');
			$result = curl_exec($request);
			$status = intval(curl_getinfo($request, CURLINFO_HTTP_CODE));
			curl_close($request);
			
			if($status==200)
			{
				return json_decode($result, true);
			}
			else
			{
				return false;
			}
		}
		
		/** 
		* List the company officers
		*
		* Query parameters: 
		* (string) 	company_number - The company number of the officer list being requested
		* (array)	query_string
		* 	(integer) 	items_per_page - The number of officers to return per page
		* 	(integer) 	start_index - The offset into the entire result set that this page starts
		* 	(string)	order_by - The field by which to order the result set. 
		* 	Possible values are: appointed_on, resigned_on, surname
		*/
		
		public function company_officers($company_number, $query_string = array())
		{
			$query_string = http_build_query($query_string);
			
			if(empty($query_string))
			{
				$query_string = '/officers';
			}
			else
			{
				$query_string = '/officers?' . $query_string;
			}
			
			$request = curl_init();
			curl_setopt($request, CURLOPT_URL, $this->_Endpoint . '/company/' . $company_number . '/officers');
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($request, CURLOPT_USERPWD, $this->_ApiKey . ':');
			$result = curl_exec($request);
			$status = intval(curl_getinfo($request, CURLINFO_HTTP_CODE));
			curl_close($request);
			
			if($status==200)
			{
				return json_decode($result, true);
			}
			else
			{
				return false;
			}
		}
		
		/** 
		* Get a specific filling transaction of a company
		*
		* Query parameters: 
		* @param (string) company_number - The company number of the officer list being requested
		* @param (string) transaction_id - The transaction id that the filing history is required for *optional*
		*
		* @return array
		*/
		
		public function company_filling($company_number, $transaction_id = '')
		{
			if(empty($transaction_id))
			{
				$query_string = '/filing-history';
			}
			else
			{
				$query_string = '/filing-history/' . $transaction_id;
			}
			
			$request = curl_init();
			curl_setopt($request, CURLOPT_URL, $this->_Endpoint . '/company/' . $company_number . $query_string);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($request, CURLOPT_USERPWD, $this->_ApiKey . ':');
			$result = curl_exec($request);
			$status = intval(curl_getinfo($request, CURLINFO_HTTP_CODE));
			curl_close($request);
			
			if($status==200)
			{
				return json_decode($result, true);
			}
			else
			{
				return false;
			}
		}
		
		/** 
		* Get company insolvency information
		*
		* Query parameters: 
		* @param (string) company_number - The company number of the insolvency information being requested
		*
		* @return array
		*/
		
		public function company_insolvency($company_number)
		{
			$request = curl_init();
			curl_setopt($request, CURLOPT_URL, $this->_Endpoint . '/company/' . $company_number . '/insolvency');
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($request, CURLOPT_USERPWD, $this->_ApiKey . ':');
			$result = curl_exec($request);
			$status = intval(curl_getinfo($request, CURLINFO_HTTP_CODE));
			curl_close($request);
			
			if($status==200)
			{
				return json_decode($result, true);
			}
			else
			{
				return false;
			}
		}
		
		/** 
		* Company charges information/individual charge information
		*
		* Query parameters: 
		* @param (string) company_number - The company number of the charges information being requested
		* @param (string) charge_id - The id of the charge details that are required
		*
		* @return array
		*/
		
		public function company_charges($company_number, $charge_id = '')
		{
			if(empty($charge_id))
			{
				$query_string = '/charges';
			}
			else
			{
				$query_string = '/charges/' . $charge_id;
			}
			
			$request = curl_init();
			curl_setopt($request, CURLOPT_URL, $this->_Endpoint . '/company/' . $company_number . $query_string);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($request, CURLOPT_USERPWD, $this->_ApiKey . ':');
			$result = curl_exec($request);
			$status = intval(curl_getinfo($request, CURLINFO_HTTP_CODE));
			curl_close($request);
			
			if($status==200)
			{
				return json_decode($result, true);
			}
			else
			{
				return false;
			}
		}
	}
	
?>
