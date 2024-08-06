<?php

namespace OpenBackup\Admin;

class Framework
{
    public function __construct(private Router $router, private string $uri) {}

    public function dispatch($uri) {
            //if (array_key_exists($uri, $this->router->routes)) {
        
        $matched_route = $this->router->getRouteFor($uri);

        if ( !empty($matched_route) ) {
            $controller = $matched_route['controller'];
            $action = $matched_route['action'];
  
            $arguments = $matched_route['arguments'];
            $arguments['uri'] = $this->uri;
              
            $controller = new $controller();
            $controller->$action($arguments);
        } else {
            // return 200 so it works with htmx without doing anything else. Not great, not terrible. 
            wp_die("No route found for URI: $uri", "Nothing here", array('response' => 200));            
        }
    }
}