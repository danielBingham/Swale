<?PHP

/**
 *
 */
interface Database
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
}
