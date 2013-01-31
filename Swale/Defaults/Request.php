<?PHP
namespace Swale\Defaults;

use Swale\Core\Request as IRequest;

class Request implements IRequest
{
	protected $_get;
	protected $_post;
	protected $_cookie;

	public function __construct($get, $post, $cookie)
	{
		$this->_get = $get;
		$this->_post = $post;
		$this->_cookie = $cookie;
	}

	/**
	 *
	 */
	public function get($item, $default=null) 
	{
		if (is_array($item)) {
			return $this->_getArrayItem('_get', $item, $default);
		} else if( ! isset($this->_get[$item])) {
			return $default;
		}

		return $this->_get[$item];
	}

	/**
	 *
	 */
	public function post($item, $default=null) 
	{
		if (is_array($item)) {
			return $this->_getArrayItem('_post', $item, $default);
		} else if( ! isset($this->_post[$item])) {
			return $default;
		}

		return $this->_post[$item];
	}
	
	/**
	 *
	 */
	public function cookie($item, $default=null) 
	{
		if (is_array($item)) {
			return $this->_getArrayItem('_cookie', $item, $default);	
		} else if( ! isset($this->_cookie[$item])) {
			return $default;
		}

		return $this->_cookie[$item];
	}

	/**
	 *
 	 */
	protected function _getArrayItem($array, $item, $default=null)
	{
		$value = $this->$array;
		foreach ($item as $i) {
			if ( ! isset($value[$i])) {
				return $default;
			}
			$value = $value[$i];
		}
		return $value;
	}

	/**
	 *
	 */
	public function allGet()
	{
		return $this->_get;
	}

	/**
	 *
 	 */
	public function allPost()
	{
		return $this->_post;
	}

	/**
	 *
	 */
	public function allCookies()
	{
		return $this->_cookies;
	}

	/**
	 *
	 */
	public function cleanGet($item, $default=null)
	{
		return $this->clean($this->get($item, $default));
	}

	/**
 	 *
	 */
	public function cleanPost($item, $default=null)
	{
		return $this->clean($this->post($item, $default));
	}

	/**
	 *
	 */
	public function cleanCookie($item, $default=null)
	{
		return $this->clean($this->cookie($item, $default));
	}

	/**
	 *
	 */
	public function clean($value)
	{
		return $value;
	}
}
