<?PHP
namespace Swale\Core;

/**
 * Swale Router
 *
 * Handle routing URLs to their appropriate controller
 * and method.
 */
interface Router
{

	/**
	 *
	 */
	public function getControllerClass();

	/**
	 *
	 */
	public function getController();

	/**
	 *
	 */
	public function getAction();

}
