<?php

namespace Commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Templates\RoutesTemplate;



class MakeRoutesCommand extends Command {

    protected static $defaultName = 'make:routes';

    protected function configure() {
        $this
            ->setDescription("Génération de routes pour une ressource")
            ->addArgument('name', InputArgument::REQUIRED, 'Nom de la ressource');

    }


    protected function execute(InputInterface $input, OutputInterface $output) {

        $name = $input->getArgument('name');

        $template = RoutesTemplate::get($name);

        $directory = __DIR__.'/../../../../src/routes';


        if(!is_dir($directory)) 
            mkdir($directory, 0777, true);

        
        $filePath = "$directory/$name.php";


        if(file_exists($filePath)) {
            $output->writeln("<error>Routes '{$name}' existent déjà !</error>");

            return Command::FAILURE;
        }


        file_put_contents($filePath, $template);


        $output->writeln("<info>Routes '{$name}' créées avec succès !");


        return Command::SUCCESS;
        

    }


    

}


?>