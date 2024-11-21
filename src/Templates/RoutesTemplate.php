<?php

namespace Templates;


class RoutesTemplate {


    public static function get(string $name, $auto = false) {

        $ext = ($auto)?'Routes':'';

        return <<<PHP
        <?php

        namespace Routing;


        use Gravity\Core\Routing\ResourceRoutes;
        use Gravity\Core\Routing\Route;


        class {$name}$ext extends ResourceRoutes {

            function __construct() {

                \$this->get = [
                    
                ];
            
                \$this->post = [
                    
                ];

                \$this->put = [
                    
                ];

                \$this->patch = [
                    
                ];

                \$this->delete = [
                    
                ];

            }

        }

        ?>


        PHP;
    }


}


?>