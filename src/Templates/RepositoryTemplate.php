<?php

namespace Templates;


class RepositoryTemplate {


    public static function get(string $name) {

        $tableName = lcfirst($name).'s';

        return <<<PHP
        <?php

        namespace App\Repository;


        use App\Entity\\$name;


        class {$name}Repository extends Repository {
        
            protected static \$entity = {$name}::class;
            protected static \$table = '{$tableName}';

        }

        ?>

        PHP;
    }


}


?>