<?PHP
namespace Swale\Defaults;

use Swale\Core\Config as IConfig;

/**
 * A Default Configuration Handler
 *
 * Swale's default configuration handler class.  Implements a very simple
 * configuration loading mechanism where config values are set in an array in a
 * PHP file, which is then loaded into this class.
 */
class Config implements IConfig
{
	protected $_items = array();

	/**
	 * Load a configuration file and assign it to $_items.
	 */
	public function __construct($file='')
	{
		if( ! empty($file)) {
			include($file);

			$this->_items = array_merge($this->_items, $config);
		}
	}

	/**
	 * Get an item from the loaded configuration file.
	 *
	 * @param string The name of the config item to retrieve.
	 * @param mixed The default value to return if that item doesn't exist.
	 * @return mixed Either the requested value or $default.
 	 */
	public function get($item, $default=null)
	{
		if (isset($this->_items[$item])) {
			return $this->_items[$item];
		}

		return $default;
	}

}
