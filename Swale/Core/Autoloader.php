<?PHP
namespace Swale\Core;


interface Autoloader
{

	public static function getInstance();
	public function autoload($class); 

}
