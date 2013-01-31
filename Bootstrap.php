<?PHP

// Define the application name.  This is also the Application's
// base namespace and the top level directory of all application
// code.
define('APPLICATION', 'Library');

// Include and instantiate the autoloader.
require_once(ROOT . 'Swale' . DIRECTORY_SEPARATOR . 'Core' . DIRECTORY_SEPARATOR . 'Autoloader.php');
require_once(ROOT . 'Swale' . DIRECTORY_SEPARATOR . 'Defaults' . DIRECTORY_SEPARATOR . 'Autoloader.php');
Swale\Defaults\Autoloader::getInstance();

// Create the dependency object.
$dependencies = new Swale\Defaults\Dependencies();

// Load the configuration.
$dependencies->config = new Swale\Defaults\Config();

// Create the router and feed it the information it needs.
$router = new Swale\Defaults\Router($_SERVER['REQUEST_URI']);

// Create the input handler and put it in dependencies.
$dependencies->request = new Swale\Defaults\Request($_GET, $_POST, $_COOKIE);

// Create the view loader and handler.
$dependencies->view = new Swale\Defaults\View();

$controllerClass = $router->getControllerClass();
$action = $router->getAction();

$controller = new $controllerClass();
$controller->setDependencies($dependencies);

$controller->$action();
