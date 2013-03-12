<?PHP
namespace Swale\Core;

/**
 *
 */
abstract class Dependencies
{
	protected $_dependencies = array();
	protected $_atNeed = array();	

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

	public function atNeed($name, $class)
	{
		$this->_atNeed[$name] = $class;
 		return $this;
	}

	public function instantiate($name)
	{
		if( isset($this->_atNeed[$name])) {
			$class = $this->_atNeed[$name];
			return new $class();
		}

		throw new RuntimeException('Attempt to instantiate an undefined At Need object.');
	}
}
