<?PHP
namespace Swale\Core;

/**
 *
 */
abstract class Dependencies
{
	protected $_dependencies = array();

	/**
	 *
	 */
	public function __get($name)
	{
		if ( isset($this->_dependencies[$name])) {
			return $this->_dependencies[$name];
		}

		throw new RuntimeException('Attempt to access non-existent dependency "' . $name . '"');
	}

	/**
 	 *
	 */
	public function __set($name, $dependency)
	{
		$this->_dependencies[$name] = $dependency;
	}

}
