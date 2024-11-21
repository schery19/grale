<?php

namespace Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Templates\ControllerTemplate;



class MakeControllerCommand extends Command {

    protected static $defaultName = 'make:controller';

    protected function configure() {
        $this
            ->setDescription("Génération de controleur")
            ->addArgument('name', InputArgument::REQUIRED, 'Nom du controleur');

    }


    protected function execute(InputInterface $input, OutputInterface $output) {

        $name = $input->getArgument('name');

        $template = ControllerTemplate::get($name);

        $directory = __DIR__.'/../../../../src/app/Controllers';


        if(!is_dir($directory)) 
            mkdir($directory, 0777, true);

        
        $filePath = "$directory/$name.php";


        if(file_exists($filePath)) {
            $output->writeln("<error>Controleur '{$name}' existe déjà !</error>");

            return Command::FAILURE;
        }


        file_put_contents($filePath, $template);

        $output->writeln("<info>Controleur '{$name}' créée avec succès !");


        return Command::SUCCESS;
        

    }


    

}


?>