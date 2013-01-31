<?PHP
namespace Swale\Defaults;

use Swale\Core\Controller as IController;

/**
 *
 */
class Controller implements IController
{
	protected $depends;

	/**
	 *
	 */
	public function setDependencies($dependencies)
	{
		$this->depends = $dependencies;	
	}


}
