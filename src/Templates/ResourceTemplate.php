<?php

namespace Templates;


class ResourceTemplate {


    public static function get(string $name) {

        $nameSplited = explode('Resource', $name)[0];

        return <<<PHP
        <?php

        namespace App\Resources;


        use App\Entity\\$nameSplited;



        class {$name} extends Resource {

            protected \$entity = {$nameSplited}::class;


            function toArray() {
                \$data = \$this->entity->toArray();

                return \$data;
            }


        }


        ?>

        PHP;
    }


}


?>
