<?php

namespace Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Templates\ResourceTemplate;



class MakeResourceCommand extends Command {

    protected static $defaultName = 'make:resource';

    protected function configure() {
        $this
            ->setDescription("Génération de ressource")
            ->addArgument('name', InputArgument::REQUIRED, 'Nom de la resource');

    }


    protected function execute(InputInterface $input, OutputInterface $output) {

        $name = $input->getArgument('name');

        $template = ResourceTemplate::get($name);

        $directory = __DIR__.'/../../../../src/app/Resources';


        if(!is_dir($directory)) 
            mkdir($directory, 0777, true);

        
        $filePath = "$directory/$name.php";


        if(file_exists($filePath)) {
            $output->writeln("<error>Ressource '{$name}' existe déjà !</error>");

            return Command::FAILURE;
        }


        file_put_contents($filePath, $template);

        $output->writeln("<info>Ressource '{$name}' créée avec succès !");


        return Command::SUCCESS;
        

    }


    

}


?>