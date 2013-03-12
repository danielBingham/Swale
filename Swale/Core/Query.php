<?PHP
/**
 *
 */
interface Query
{
	/**
 	 *	Add an entity from which fields might be retrieved to the query.
	 * 
	 * @param string The name of an entity.
	 */
	public function entity($entity);

	/**
	 * Add multiple entities to the query from which fields might be retrieved.
	 *
	 * @param string[] An array of entity names.
 	 */
	public function entities(array $entities);

	/**
	 * Add a field belonging to one of the entities that the query needs to
	 * retrieve.
	 *
 	 * @param string A field name.
	 */
	public function field($name);

	/**
	 * Add multiple fields for the query to retrieve from the requested
	 * entities.
	 * 
	 * @param string[] The field names.
	 */
	public function fields(array $names);

	/**
 	 * Add a filter to our query that will prevent some objects from being
 	 * retrieved.
	 * 
	 * @param Filter A filter object that will be used to select
	 * 					entities from the db.
 	 */
	public function filter($filter);

	/**
	 * Add multiple filters to our query that will prevent some objects from
	 * being retrieved.
	 *
 	 * @param Filter A filter object that will be used to select entites.
 	 */
	public function filters(array $filters);

	/**
 	 * Excute the query we have constructed.
 	 */
	public function execute();
}
