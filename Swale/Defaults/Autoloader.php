<?PHP
namespace Swale\Defaults;

use Swale\Core\Autoloader as IAutoloader;

/**
 * A Default Autoloader Implementation
 *
 * Implements a PSR-0
 * ({https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md})
 * compatible autoloader as a singleton that will register itself with
 * spl_autoload_register() on instantiation.  Utilizes a protected constructor
 * and a getInstance() method to ensure that it is only instantiated once per
 * request.
 *
 * @author Daniel Bingham
 * @copyright Daniel Bingham (C) 2012
 * @licence http://opensource.org/licenses/MIT MIT Licence
 */
class Autoloader implements IAutoloader
{
	protected static $_instance = null;

	/**
	 * Construct an Autoloader
	 * 
	 * Registers this object's autoload method with spl_autoload_register().
	 * Protected so that it can only be accessed by the getInstance() method.
	 * We only want this to be called once per request.
	 */
	protected function __construct()
	{
		spl_autoload_register(array($this, 'autoload'));
	}

	/**
 	 * Get an Instance of the Autoloader
	 *
	 * Since the constructor of Autoloader registers the autoload method with
	 * spl_autoload_register(), we want this class to be a singleton with only
	 * one ever being instantiated per request.  Having more than one
	 * instantiated will have multiple copies of the same autoload method being
	 * registered.  Which, while probably not horrific performancewise, is just
	 * silly.
	 * 
	 * @return Autoloader This request's instance of Autoloader.
	 */
	public static function getInstance()
	{
		if (self::$_instance === null) {
			self::$_instance = new Autoloader();
		}
		return self::$_instance;
	}

	/**
	 * Autoload
	 *
	 * Implements a PSR-0 compatible autoloader.  Will break each element
	 * in the namespace into a directory in the path.  Each underscore in
	 * the class name will also become a directory.  Finally the path will
	 * be appended with '.php'. After building the path, it requires the
	 * file.
	 * 
	 * @param string The fully qualified class name to be loaded.
	 */
	public function autoload($class)
	{
		$path = ROOT;
		if ( ($lastSeparator = strrpos($class, '\\')) !== FALSE) {
			$namespace = ltrim(substr($class, 0, $lastSeparator), '\\');
			$path .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
			
			$class = substr($class, $lastSeparator+1);
		} 
		$path .= str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';

		require_once($path);
	}

}
