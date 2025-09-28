<?php
class Router
{
        private $_ctrl;
        private $_view;

        public function routeReq()
        {
            try
            {
                //chargement automatique des classes dans le dossier models
                spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');                
                });
                $url = [];

                if(isset($_GET['url']))
                {
                    echo"la";
                    //filtre la valeur de url afin de supprimer les caracteres spéciaux et les balises html
                    $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                    
                    //le controller sera egale au premier parametre dans l'url
                    $controller = ucfirst(strtolower($url[0]));             // grace au camelCase on recupere le nom de la class dans controllers
                    $controllerClass = "Controller".$controller;            //ici on prend le fichier de $controller
                    $controllerFile = "controllers/".$controllerClass.".php";//on ajoute le chemin et l'extension

                    if(file_exists($controllerFile))
                    {
                        require_once ($controllerFile);
                        $this->_ctrl = new $controllerClass($url);
                    }
                    else 
                        throw new Exception('Page introuvble');
                }
                else
                {
                    echo"ou la ";
                    require_once('controllers/ControllerAccueil.php');
                    $this->_ctrl = new ControllerAccueil($url);
                }
            }
            catch(Exception $e)
            {
                $errorMessage = $e->getMessage();
                require_once('views/viewError.php');
            }
        }
}
?>