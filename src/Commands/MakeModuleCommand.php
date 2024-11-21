<?php

namespace Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Templates\ControllerTemplate;
use Templates\EntityTemplate;
use Templates\RepositoryTemplate;
use Templates\ResourceTemplate;
use Templates\RoutesTemplate;



class MakeModuleCommand extends Command {

    protected static $defaultName = 'make:module';

    protected function configure() {
        $this
            ->setDescription("Génération de module")
            ->addArgument('name', InputArgument::REQUIRED, 'Nom du module');

    }


    protected function execute(InputInterface $input, OutputInterface $output) {

        $name = $input->getArgument('name');

        $this->generateController($name, $output);
        $this->generateEntity($name, $output);
        $this->generateRepository($name, $output);
        $this->generateRoutes($name, $output);


        return Command::SUCCESS;
        

    }



    private function generateController(string $name, OutputInterface $output) {

        $template = ControllerTemplate::get($name, true);

        $directory = __DIR__.'/../../../../src/app/Controllers';


        if(!is_dir($directory)) 
            mkdir($directory, 0777, true);

        
        $filePath = "$directory/{$name}Controller.php";


        if(file_exists($filePath)) 
            $output->writeln("<error>Controleur '{$name}Controller' existe déjà !</error>");
        else
            file_put_contents($filePath, $template);


        $output->writeln("<info>Controleur '{$name}Controller' créé avec succès !");
        
    }



    private function generateEntity(string $name, OutputInterface $output) {

        $template = EntityTemplate::get($name);

        $directory = __DIR__.'/../../../../src/app/Entity';


        if(!is_dir($directory)) 
            mkdir($directory, 0777, true);

        
        $filePath = "$directory/$name.php";


        if(file_exists($filePath)) 
            $output->writeln("<error>Entité '{$name}' existe déjà !</error>");
        else
            file_put_contents($filePath, $template);


        $output->writeln("<info>Entité '{$name}' créée avec succès !");
    }



    private function generateRepository(string $name, OutputInterface $output) {

        $template = RepositoryTemplate::get($name);

        $directory = __DIR__.'/../../../../src/app/Repository';


        if(!is_dir($directory)) 
            mkdir($directory, 0777, true);

        
        $filePath = "$directory/{$name}Repository.php";


        if(file_exists($filePath)) 
            $output->writeln("<error>Repository '{$name}Repository' existe déjà !</error>");
        else
            file_put_contents($filePath, $template);


        $output->writeln("<info>Repository '{$name}Repository' créé avec succès !");

    }



    private function generateRoutes(string $name, OutputInterface $output) {

        $template = RoutesTemplate::get($name, true);

        $directory = __DIR__.'/../../../../src/routes';


        if(!is_dir($directory)) 
            mkdir($directory, 0777, true);

        
        $filePath = "$directory/{$name}Routes.php";


        if(file_exists($filePath)) 
            $output->writeln("<error>Routes '{$name}Routes' existent déjà !</error>");
        else
            file_put_contents($filePath, $template);
        

        $output->writeln("<info>Routes '{$name}Routes' créées avec succès !");

    }





    

}


?>