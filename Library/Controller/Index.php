<?PHP
namespace Library\Controller;

use Swale\Defaults\Controller as Controller;

class Index extends Controller 
{

	public function index()
	{
		$vars = array('test'=>'I am testing.');

		$this->depends->view->render(ROOT . 'Library' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR . 'index.php', $vars);
	}

}
