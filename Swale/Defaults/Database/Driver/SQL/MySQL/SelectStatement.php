<?PHP
namespace Swale\Defaults\Database\Driver\SQL\MySQL;

use Swale\Defaults\Database\Driver\SQL\MySQL\WhereStatement as WhereStatement;
use Swale\Defaults\Database\Driver\SQL\MySQL\MySQLStatement as MySQLStatement;

class SelectStatement extends MySQLStatement
{
	protected $_connection;

	protected $_columns = array();
	protected $_from = NULL;
	protected $_join = array();
	protected $_where = '';
	protected $_orderby = array();
	protected $_limit = NULL;
	protected $_offset = 0;

	protected $_paramId = 0;
	protected $_parameters = array();

	public function __construct(PDO $connection)
	{
		$this->_connection = $connection;
	}

	public function column($column)
	{
		$this->_columns[] = $column;
		return $this;
	}

	public function columns(array $columns)
	{
		foreach ($columns as $column)
		{
			$this->column($columns);
		}
		return $this;	
	}

	public function from($table, $alias=NULL)
	{
		if ($alias == NULL) {
			$this->_from = $table;
		} else {
			$this->_from = $table . ' AS ' . $alias;
		}
		return $this;
	}

	public function join($table, $on, $alias='', $parameters=array(), $type='')
	{
		$this->handleParameters($on, $parameters);

		$this->_join[$table] = array(
			'on' => $on,
			'alias' => $alias,
			'type' => $type
		);

		return $this;
	}

	public function where()
	{

		$this->_where = new WhereStatement();
		return $this->where;
	}

	public function orderby($column, $direction='desc')
	{
		$this->_orderby[$column] = $desc;	
		return $this;
	}

	public function limit($limit)
	{
		$this->_limit = $limit;
		return $this;
	}

	public function offset($offset)
	{
		$this->_offset= $offset;
		return $this;
	}

	public function execute()
	{
		return $this->_connection->query($this->compile());
	}

	/**
	 * TODO Figure out how to handle possibly overlapping parameters.
	 */
	protected function compile()
	{
		$sql = 'SELECT';
	
		foreach ($this->_columns as $column) {
			$sql .= ($sql == 'SELECT' ? ' ' : ', ') . $column;
		}

		$sql .= ' FROM ' . $this->_from;
	
		foreach ($this->_join as $table => $info) {
			if ($info['type'] !== '') {
				$sql .= ' ' . $info['type'];	
			}
			$sql .= ' JOIN ' . $table . ($info['alias'] !== '' ? ' AS ' . $info['alias'] : '');
			$sql .= ' ON ' . $info['statement'];
		}
	}

}
