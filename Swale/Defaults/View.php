<?PHP
namespace Swale\Defaults;

use Swale\Core\View as IView;

/**
 *
 */
class View implements IView 
{
	public $variables;
	
	public function __construct()
	{}

	public function render($path, array $variables)
	{
		$this->variables = $variables;
		include($path);
	}

}
