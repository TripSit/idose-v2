<?php 

/**
 * The application Core handling all the requests
 * 
 * @package atomar
 * @author change <spr1t3-0@riseup.net>
 */

use \Bramus\Router\Router;

class Core {

    protected $Router;

    /**
     * Construct the Core class, start handling incoming requests
     * 
     * @return void
     */
    public function __construct() {
        $this->Router = new Router();

        $this->Router->get('/', function() {
            $this->call('Pages', 'index');
        });

      
        $this->Router->run();
    }
    
    /**
     * Call a given Controller Method
     *
     * @param string $controller Controller to call without .php extension
     * @param string $method Function to execute
     * @param array $params (Optional) named parameters, if any.
     * @return mixed The function result, or false on error
     */
    private function call(string $controller, string $method, array $params = []):mixed {
        $controller = ucfirst($controller);
        require_once(APP_ROOT . '/src/controllers/' . $controller . ".php");
        $instance = new $controller();
        return call_user_func_array([$instance, $method], $params);

        
    }

    /**
     * Check if a Controller Method exists
     *
     * @param string $controller Controller to search for without .php file extension
     * @param string $method Function to search for
     * @return bool
     */
    public function validMethod(string $controller, string $method):bool {
        if(file_exists($f = APP_ROOT . '/src/controllers/' . ucfirst($controller) . ".php")) {
            require_once($f);
            $controller = ucfirst($controller);
            return method_exists((new $controller()), $method);
        } else {
            return false;
        }
    }



}