<?php 

namespace SatelliteWP\Teamwork\Chat;

class Webhook {

	/**
	 * Webhook URL
	 */
	protected $webhookUrl = null;


	/**
	 * Constructor
	 * 
	 * @param string $webhookUrl
	 */
	public function __construct($webhookUrl) {
		$this->webhookUrl = $webhookUrl;
	}

	/**
	 * Send message to webhook
	 * 
	 * @param string $message Message
	 * 
	 * @return bool True on success. Otherwise, false.
	 */
	public function sendMessage($message) {
		$params = [
			'post' => [ 'body' => $message]
		];

		$response = $this->call($this->webhookUrl, [], $params);

		if (isset($response['http_code']) && $response['http_code'] == '201') {
			return true;
		}

		return false;
	}

	/**
	 * Make API call
	 * 
	 * @param string $url URL
	 * @param array $urlParams URL parameters (GET)
	 * @param array $params Parameters
	 * 
	 * @return array
	 */
	protected function call($url, $urlParams, $params = null) {

		$defaults = array(
			CURLOPT_POST => 0,
			CURLOPT_HEADER => 0,
			CURLOPT_FRESH_CONNECT => 1,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_FORBID_REUSE => 1,
			CURLOPT_TIMEOUT => 5,
			CURLOPT_HTTPHEADER => array(
				'accept: application/json',
				'content-type: application/json'
			),
		);

		$ch = curl_init();
		curl_setopt_array($ch, $defaults);

		// URL
		$urlEnd = $urlParams;
		if (is_array($urlParams)) {
			$urlEnd = implode('/', $urlParams);
		}

		// Add GET params, if any
		$queryParams = '';
		if (isset( $params['get']) && is_array($params['get'])) {
			$queryParams = '?' . http_build_query($params['get']);
		}

		// Add POST params, if any
		if (isset($params['post']) && is_array($params['post'])) {
			curl_setopt($ch,CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params['post']));
		}
		
		$finalUrl = $url . $urlEnd . $queryParams;
		curl_setopt($ch, CURLOPT_URL, $finalUrl);


		// Execute
		$data = curl_exec($ch);

		if ($data === false) {
			throw new \Exception(curl_error($ch), curl_errno($ch));
		}

		// Build result array
		$result = array(
			'http_code' => curl_getinfo($ch, CURLINFO_HTTP_CODE),
			'body' => $data,
		);

		// Close resource
		curl_close($ch);

		return $result;
	}
}