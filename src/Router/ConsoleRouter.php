<?php
namespace ItForFree\SimpleMVC\Router;

/**
 * Класс-маршрутизатор, его задача по переданным аргументам в консоли,
 * определить какой контроллер и какое действие надо вызывать.
 */

class ConsoleRouter extends Router
{
    
    public static function getRoute(): string 
    {
	global $argv;
	$getValue = $argv[1] . '/' . ($argv[2] ?? '');
	return $getValue;
    }

    public function callControllerAction(string $route, mixed $data = null): object
    {
        $controllerName = $this->getControllerClassName($route);
        
        $controllerFile = $this->getControllerFileName($controllerName);
        if(!file_exists($controllerFile)) {
            throw new SmvcRoutingException("Файл контроллера [$controllerFile] не найден.");
        } else {
            if (!class_exists($controllerName)) {
                throw new SmvcRoutingException("Контроллер [$controllerName] не найден.");
            } 
        } 
        $controller = new $controllerName();
        $actionName = $this->getControllerActionName($route);
	
        $methodName =  $this->getControllerMethodName($actionName);
            
        if (!method_exists($controller, $methodName)) {
            throw new SmvcRoutingException("Метод контроллера ([$controllerName])"
		    . " [$methodName] для данного действия [$actionName] не найден.");
        }

        if($data !== null) {
            $controller->$methodName($data); // вызываем действие контроллера
        } else {
            $controller->$methodName();
        }
        
        return $this;
    }
    
    private function getControllerFileName(string $controllerName): string
    {
        global $projectRoot;
	$urlFragments = explode('\\', $controllerName);
        $res = implode('/', $urlFragments) . '.php';
	return $projectRoot . $res;
    }

}