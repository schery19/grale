<?php

namespace Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Templates\EntityTemplate;



class MakeEntityCommand extends Command {

    protected static $defaultName = 'make:entity';

    protected function configure() {
        $this
            ->setDescription("Génération d'entité")
            ->addArgument('name', InputArgument::REQUIRED, 'Nom de l\'entité');

    }


    protected function execute(InputInterface $input, OutputInterface $output) {

        $name = $input->getArgument('name');

        $template = EntityTemplate::get($name);

        $directory = __DIR__.'/../../../../src/app/Entity';


        if(!is_dir($directory)) 
            mkdir($directory, 0777, true);

        
        $filePath = "$directory/$name.php";


        if(file_exists($filePath)) {
            $output->writeln("<error>Entité '{$name}' existe déjà !</error>");

            return Command::FAILURE;
        }


        file_put_contents($filePath, $template);

        $output->writeln("<info>Entité '{$name}' créée avec succès !");


        return Command::SUCCESS;
        

    }


    

}


?>