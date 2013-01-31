<?PHP
namespace Swale\Core;

interface View
{
	public function render($path, array $variables);
}
