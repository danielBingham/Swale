<?PHP
namespace Swale\Core\Database;

use Swale\Core\Query as Query;

/**
 *
 */
interface Driver
{
	/**
	 *
	 */
	public function create($entity);

	/**
	 *
	 */
	public function retrieve($entity, $id);

	/**
	 *
	 */
	public function update($entity, $id);
	
	/**
	 *
	 */
	public function delete($entity, $id);
	
	/**
	 *
	 */
	public function execute(Query $query);

}
