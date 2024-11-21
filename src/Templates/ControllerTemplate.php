<?php

namespace Templates;


class ControllerTemplate {


    public static function get(string $name, $auto = false) {

        $ext = ($auto)?'Controller':'';


        return <<<PHP
        <?php

        namespace App\Controllers;


        class {$name}$ext extends BaseController {
        
            public function index() {}


            public function search(\$id) {}


            public function store() {}


            public function update(\$id) {}


            public function delete(\$id) {}

        }

        ?>

        PHP;
    }


}


?>