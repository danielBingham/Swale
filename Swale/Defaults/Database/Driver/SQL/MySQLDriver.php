<?PHP
namespace Swale\Default\Database\Driver\SQL;

use Swale\Core\Database\Driver as IDriver;

use Swale\Defaults\Database\Driver\SQL\MySQL\SelectStatement as SelectStatement;
use Swale\Defaults\Database\Driver\SQL\MySQL\UpdateStatement as UpdateStatement;
use Swale\Defaults\Database\Driver\SQL\MySQL\InsertStatement as InsertStatement;
use Swale\Defaults\Database\Driver\SQL\MySQL\DeleteStatement as DeleteStatement;

class MySQLDriver implements IDriver
{
	private $_connection;	

	public function __construct($host, $user, $password)
	{
		$this->_connection = new PDO('dbname=mysql;host=' . $host, $user, $password);	
	}

	public function select()
	{
		return new SelectStatement($this->_connection);
	}

	public function update()
	{
		return new UpdateStatement($this->_connection);
	}

	public function insert()
	{
		return new InsertStatement($this->_connection);
	}

	public function delete()
	{
		return new DeleteStatement($this->_connection);
	}

}
