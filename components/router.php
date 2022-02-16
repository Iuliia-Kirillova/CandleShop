<?php

    class Router
    {
        private $routes;

        public function __construct()
        {
            include_once('./config/routes.php');
            $this->routes = $routes;
        }

        public function run()
        {
            $userUrl = $_SERVER['REDIRECT_URL'];
            $found = false;
            foreach ($this->routes as $controller => $paths) {
                foreach ($paths as $path => $actionWithParameters) {
                    $fullPath = SITE_ROOT . $path;
                    if (preg_match("~$fullPath~", $userUrl)) {
                        $actionWithParameters = preg_replace("~$fullPath~", $actionWithParameters, $userUrl); // => 'edit/5'
                        $actionWithParametersArray = explode("/", $actionWithParameters); // => ['edit', '5']
                        $actionWithoutParameters = array_shift($actionWithParametersArray); // => 'edit'
                        $requestedController = new $controller();
                        $found = true;
                        $action = 'action' . ucfirst($actionWithoutParameters); // => 'actionEdit'
                        call_user_func_array(array($requestedController, $action), $actionWithParametersArray);
                        break 2;
                    }
                }
            }
            if (!$found) {
                $error = new ErrorController;
                $error->actionError();
                // TODO: redirect на ErrorController -> actionError;

            }
        }
    }