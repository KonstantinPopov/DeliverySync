<?php
namespace Nitra\DeliveryBundle\Common;


class PecomKabinet
{
	/**
	 * ������ ���������� API (�� PHP SDK!)
	 * @const string
	 */
	const VERSION = '1.0';

	/**
	 * ������� URL �� ���������
	 * @const string
	 */
	const API_BASE_URL = 'https://kabinet.pecom.ru/api/v1/';

	/**
	 * ��� ������������
	 * @var string
	 */
	private $_api_login = '';

	/**
	 * ���� ������� � API
	 * @var string
	 */
	private $_api_key = '';

	/**
	 * ������� URL
	 * @var string
	 */
	private $_api_url = '';

	/**
	 * ��������������� �������� curl
	 * @var array
	 */
	private $_curl_options = array();

	/**
	 * ��������� curl'�
	 * @var resource
	 */
	private $_ch = null;

	/**
	 * ����������� ������
	 * @param string $api_login ��� ������������
	 * @param string $api_key ���� ������� � API
	 * @param array $curl_options �������������� ��������� ��� curl (�������� ���������������)
	 * @param string $api_url ������� URL API (�������������� ��������), ���� �� ������ ������������ ����� �� ���������
	 * @throws PecomKabinetException
	 */
	public function __construct($api_login, $api_key, $curl_options = array(), $api_url = '')
	{
		$this->_api_login = $api_login;
		$this->_api_key = $api_key;
		$this->_api_url = ($api_url === '') ? self::API_BASE_URL : $api_url;
		$this->_curl_options = $curl_options;
	}

	/**
	 * ������������ ����� ������ API
	 * @param string $controller �������� ������
	 * @param string $action �������� ������
	 * @param mixed $data �������� ������ �������
	 * @param bool $assoc ������ ������������� ����������, ���� ����������� � true ��������� ����� ��������, false -- ��������
	 * @return mixed ��������� ���������� �������
	 * @throws PecomKabinetException � ������ ������ ��� ������������� �������
	 */
	public function call($controller, $action, $data, $assoc = false)
	{
		if (is_null($this->_ch))
		{
			$this->_init_curl();
		}

		$json_data = json_encode($data);

		curl_setopt_array($this->_ch, array(
			CURLOPT_URL => $this->_construct_api_url($controller, $action),
			CURLOPT_POSTFIELDS => $json_data,
		));

		$result = curl_exec($this->_ch);

		if (curl_errno($this->_ch))
		{
			throw new \Exception(curl_error($this->_ch));
		}
		else
		{
			$http_code = intval(curl_getinfo($this->_ch, CURLINFO_HTTP_CODE));

			if ($http_code != 200)
			{
				throw new \Exception(sprintf('HTTP error code: %d', $http_code));
			}

			$decoded_result = json_decode($result, $assoc);
		}

		return $decoded_result;
	}

	/**
	 * ��������� curl-����������
	 * @return void
	 */
	public function close()
	{
		if (!is_null($this->_ch))
		{
			curl_close($this->_ch);
		}
	}

	/**
	 * ���������� ������ URL ��� ������� � ������ API
	 * @param string $controller �������� ������
	 * @param string $action �������� ������
	 * @return string ������ URL
	 */
	private function _construct_api_url($controller, $action)
	{
		return sprintf('%s%s/%s/', $this->_api_url, $controller, $action);
	}

	/**
	 * �������������� curl
	 * @return resource ��������� curl'� ��� ��������
	 */
	private function _init_curl()
	{
		$this->_ch = curl_init();
		$options = $this->_curl_options + array(
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_POST => TRUE,
			CURLOPT_SSL_VERIFYPEER => TRUE,
			CURLOPT_SSL_VERIFYHOST => 2,
			CURLOPT_CAINFO => dirname(__FILE__) . '/cacert-kabinet_pecom_ru.pem',
			CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
			CURLOPT_USERPWD => sprintf('%s:%s', $this->_api_login, $this->_api_key),
			CURLOPT_ENCODING => 'gzip',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json; charset=utf-8',
			));
		curl_setopt_array($this->_ch, $options);
	}
}