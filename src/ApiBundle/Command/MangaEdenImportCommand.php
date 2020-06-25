<?php

namespace ApiBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\HttpClient;
use ApiBundle\Entity\Manga;
use ApiBundle\Entity\MangaOrigin;

class MangaEdenImportCommand extends ContainerAwareCommand
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'api:mangaEden-import';

    const BASE_URL = "https://www.mangaeden.com/api/";
    const BASE_URL_IMG = "https://cdn.mangaeden.com/mangasimg/";
    const LIST_URL = 'list/';
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
        $url = MangaEdenImportCommand::BASE_URL.MangaEdenImportCommand::LIST_URL.MangaEdenImportCommand::LANGUAGE_URL;
        $now = new \DateTime();
        $response = $client->request('GET', $url);
        $statusCode = $response->getStatusCode();
        $content = $response->toArray();
        foreach ($content['manga'] as $manga) {
            $output->writeln('title'. $manga['t']);
            $i = $manga['i'];
            $m = new Manga();
            $mangaOrigin = new MangaOrigin();
            $mangaOrigin->setManga($m);
            $mangaOrigin->setOrigin('MangaEden');
            $mangaOrigin->setdateLastUpdated($now);
            foreach ($manga as $key => $value) {
                switch ($key) {
                    case 'a':
                        $m->setSlug($value);
                        break; 
                    case 't':
                        $m->setTitle($value);
                        break;                    
                    case 'c':
                        break;                    
                    case 'h':
                        break;
                    case 'ld':
                        $date = new \DateTime();
                        $date->setTimestamp($value);
                        $m->setDateLastChapterDate($date);
                        break;                         
                    case 'i':
                        $mangaOrigin->setOriginId($value);
                        break;                    
                    case 'im':
                        if ($value) {
                           // $url_img = MangaEdenImportCommand::BASE_URL_IMG.$value;
                            $url_img = "https://media.kitsu.io/categories/images/10/tiny.jpg";
                            $output->writeln($url_img);
                            $path_img = 'd:/images/'.$i.'.png';
                            //save_image($url_img,$title.'png');
                            file_put_contents($path_img, file_get_contents($url_img));

                            // $ch = curl_init($url_img);
                            // $fp = fopen($path_img.$i.'.'.substr($value, -3), 'wb');
                            // curl_setopt($ch, CURLOPT_FILE, $fp);
                            // curl_setopt($ch, CURLOPT_HEADER, 0);
                            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                            // curl_exec($ch);
                            // curl_close($ch);
                            // fclose($fp);


                           // $m->setImage($value);
                        }
                        
                        break;                    
                    case 's':
                        $m->setStatus($value);
                        break;
                     
                     default:
                        break;
                } 
                $em->persist($m);
                $em->persist($mangaOrigin);
            }
        }
        $em->flush();

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