<?PHP
namespace Swale\Default;

use Swale\Core\Query as IQuery;
use Swale\Core\Database\Driver as Driver;

/**
 *
 */
class Query implements IQuery
{
	protected $_driver = null;	
	protected $_entites = array();
	protected $_fields = array();
	protected $_filters = array();

	/**
 	 *
 	 */	
	public function __construct(Driver $driver)
	{
		$this->_driver = $driver;
	}

	/**
 	 *
 	 */
	public function getFilters()
 	{
		return $this->_filters;
	}

	/**
	 *
 	 */
	public function getFields()
	{
		return $this->_fields;
	}

	/**
	 *
	 */
	public function getEntites()
	{
		return $this->_entities;
	}

	/**
	 *
	 */
	public function entity($entity)
	{
		$this->_entities[] = $entity;
		return $this;
	}

	/**
 	 *
 	 */
	public function entites(array $entities)
	{
		foreach ($entities as $entity) {
			$this->entity($entity);
		}
		return $this;
	}

	/**
	 *
	 */
	public function field($field)
	{
		$this->_fields[] = $field;
		return $this;
	}
	
	/**
	 *
	 */
	public function fields(array $fields)
	{
		foreach ($fields as $field) {	
			$this->field($field);
		}
		return $this;
	}

	/**
	 *
	 */
	public function filter($filter)
	{
		if ( ! ($filter instanceof Filter)) {
			throw new RuntimeException('Expecting an object of type Filter.');
		}

		$this->_filters[] = $filter;
		return $this;
	}

	/**
	 *
	 */
	public function filters(array $filters)
	{
		foreach ($filters as $filter) {
			$this->filter($filter);
		}
		return $this;
	}

	/**
 	 *
 	 */
	public function execute()
	{
		return $this->_driver->execute($this);
	}

}
