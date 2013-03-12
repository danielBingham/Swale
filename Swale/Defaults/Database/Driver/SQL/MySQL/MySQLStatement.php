<?PHP
namespace Swale\Defaults\Database\Driver\SQL\MySQL;

class MySQLStatement
{
	private $_parameters = array();

	public function __construct()
	{
	}

	protected function addParameters($parameters)
	{
		foreach ($parameters as $key => $value)
		{
			$this->_paremeters[$key] = $value;
		}
	}

	protected function getParameters()
	{
		return $this->_parameters;
	}

}
