<?php 

namespace OpenBackup\Admin;

class Router {
    
    public $routes = [];
    private $arguments = [];

    /**
     * Registers a route
     *
     * @param string $route
     * @param [type] $controller
     * @param string $action
     * @param array $arguments
     * @return void
     */
    public function addRoute(string $route, $controller,string $action) {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    /**
     * Tries to find a route for the current uri. 
     * Returns empty array if none found. 
     *
     * @param string $uri
     * @return array
     */
    public function getRouteFor( string $uri ): array{

        if (empty($uri)) {
            return array();
        }

        foreach ($this->routes as $route => $callback){
            if ( $this->matchRoute($uri, $route) ) {
                $this->routes[$route]['arguments'] = $this->arguments; 
                return $this->routes[$route];
            }
        }

        return array();
    }

    /**
     * Checks if the URI matches a route. Example, if /book/id/{id} matches /book/id/3 
     * Also creating an $arguments array to be passed on containing array('id' => 3) in our example.
     *
     * @param string $uri
     * @param string $route
     * @return boolean
     */
    private function matchRoute( string $uri, string $route ): bool{
        $uri = rtrim($uri, '/');

        $uri_parts = explode('/', $uri);
        array_shift($uri_parts);

        $route_parts = explode('/', $route);
        array_shift($route_parts);

        if ($route_parts[0] == '' && count($uri_parts) == 0) {
            return true;
        }

        if (count($route_parts) != count($uri_parts)) {
            return false;
        }

        $arguments = [];

        foreach($route_parts as $key => $route_part){
            if (preg_match("~\{(.*?)\}~", $route_part)){
                $route_part = trim($route_part, '{}');
                $arguments[$route_part] = $uri_parts[$key];
            } elseif($route_part != $uri_parts[$key]) {
                return false;
            }
        }

        $this->arguments = $arguments;
        return true;
    }
}
    