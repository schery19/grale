<?php

namespace Templates;



class EntityTemplate {


    public static function get(string $name) {
        return <<<PHP
        <?php

        namespace App\Entity;


        class $name extends Entity {
        
            protected static \$required = [];


        }


        ?>

        PHP;
    }


}


?>