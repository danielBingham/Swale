<?PHP
namespace Swale\Defaults;

use Swale\Core\Router as IRouter;

/**
 * A Default Router Implementation
 *
 * A simple default implementation of the Swale Router.
 */
class Router implements IRouter
{
	protected $controller;
	protected $action;

	public function __construct($url)
	{
		$this->processURL($url);
	}

	/**
	 *
 	 */
	protected function processURL($url)
	{
		$parts = explode('/', $url);
		
		if ($url == '/' || empty($parts)) {
			$this->controller = 'index';
			$this->action = 'index';
			return;
		}

		$controller = 0;
		if (strpos($parts[$controller], '.php')) {
			$controller= 1;
		}

		if ( ! isset($parts[$controller])) {
			$this->controller = 'index';
			$this->action = 'index';
			return;	
		} else {
			$this->controller = $parts[$controller];
		}

		if ( ! isset($parts[$controller+1])) {
			$this->action = 'index';
		} else {
			$this->action = $parts[$controller+1];
		}
	}

	/**
	 *
	 */
	public function getControllerClass()
	{
		return APPLICATION . '\\Controller\\' . ucfirst($this->getController());
	}	

	/**
	 *
	 */
	public function getController()
	{
		return $this->controller;
	}

	/**
	 *
	 */
	public function getAction()
	{
		return $this->action;
	}
}
