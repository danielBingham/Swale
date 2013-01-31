<?PHP

abstract class Driver
{

	public abstract function create($entity);
	public abstract function retrieve($entity, $id);
	public abstract function update($entity, $id);
	public abstract function delete($entity, $id);

}
