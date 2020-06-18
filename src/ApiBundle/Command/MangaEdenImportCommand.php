<?php

namespace ApiBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\HttpClient;

class MangaEdenImportCommand extends ContainerAwareCommand
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'api:mangaEden-import';

    const BASE_URL = "https://www.mangaeden.com/api/";
    const LIST_URL = 'list';
    const CHAPTER_URL = 'chapter';
    const LANGUAGE_URL = '0';


    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // ... put here the code to run in your command
        $container = $this->getContainer();
        $em = $container->get('doctrine')->getManager();
        $client = HttpClient::create();
        $url = $this->BASE_URL.$this->LIST_URL.$this->LANGUAGE_URL
        $output->writeln($url);

        $response = $client->request('GET', $url);
        $statusCode = $response->getStatusCode();

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        $output->writeln('mangaeden successfully imported!');
        return 0;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;
    }
}