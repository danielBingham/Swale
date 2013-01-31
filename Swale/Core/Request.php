<?PHP
namespace Swale\Core;

/**
 *
 */
interface Request
{
	/**
	 *
	 */
	public function get($item, $default=null);

	/**
	 *
	 */
	public function post($item, $default=null);
	
	/**
	 *
	 */
	public function cookie($item, $default=null);

	/**
	 *
 	 */
	public function allGet();
	
	/**
	 *
	 */
	public function allPost();

	/**
	 *
	 */
	public function allCookies();

	/**
	 *
	 */	
	public function cleanGet($item, $default=null);
	
	/**
	 *
	 */
	public function cleanPost($item, $default=null);
	
	/**
	 *
	 */
	public function cleanCookie($item, $default=null);

	/**
	 *
 	 */
	public function clean($value);
}
