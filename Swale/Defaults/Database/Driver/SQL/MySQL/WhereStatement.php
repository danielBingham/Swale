<?PHP
namespace Swale\Defaults\Database\Driver\SQL\MySQL;

use Swale\Defaults\Database\Driver\SQL\MySQL\MySQLStatement as MySQLStatement;

/**
 * AND operator is ahead of OR in precedence so:
 *
 * x = 5 AND y = 10 OR z = 2 
 *
 * Is equivalent to:
 * 
 * (x = 5 AND y = 10) OR z = 2
 *
 * $select->where()
 * 		->group()
 *			->statement('x = :x', array('x'=>5))
 *			->and()
 *			->statement('y = :y', array('y'=>10))
 *		->endGroup()
 *		->or()
 *	 	->statement('z = :z', array('z'=>2));
 */
class WhereStatement extends MySQLStatement 
{
	private $_parent = NULL;

	private $_parts = array();
	private $_counter = -1;

	public function __construct(WhereStatement $parent = NULL)
	{
		parent::__construct();
		$this->_parent = $parent;
	}

	public function group()
	{
		$this->_counter++;
		$this->_parts[$this->_counter] = new WhereStatement($this->getParameterCounter(), $this);	
		return $this->_parts[$this->_counter];
	}

	public function and()
	{
		$this->_counter++;
		$this->_parts[$this->_counter] = 'AND';
	}

	public function or()
	{
		$this->_counter++;
		$this->_parts[$this->_counter] = 'OR';
	}

	public function statement($statement, $parameters = array())
	{
		$this->addParameters($parameters);

		$this->_counter++;
		$this->_parts[$this->_counter] = $statement;
	}
	
	public function endGroup()
	{
		return $this->_parent;
	}

}

