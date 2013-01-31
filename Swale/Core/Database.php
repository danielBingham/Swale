<?PHP

class Database
{
	protected $_driver;

	public function __construct(Driver $driver)
	{
		$this->_driver = $driver;	
	}

	public function create($entity)
	{
		return $this->_driver->create($entity);
	}
	
	public function retrieve($entity, $id)
	{
		return $this->_driver->retrieve($entity, $id);
	}

	public function update($entity, $id)
	{
		return $this->_driver->update($entity, $id);
	}

	public function delete($entity, $id)
	{
		return $this->_driver->delete($entity, $id);
	}

}
