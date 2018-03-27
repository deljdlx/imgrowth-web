<?php

namespace ImGrowth\Component\Project;


use Cocur\Slugify\Slugify;
use Phi\Application\Application;

class Controller extends \Phi\Application\Controller
{

    private $wordpressClient;

    public function __construct(Application $application)
    {
        parent::__construct($application);
        $this->wordpressClient = $this->getWordpressClient();
    }




    public function getList()
    {

    }


    public function saveImageBuffer($filepath, $imageBuffer)
    {
        $extension  = preg_replace('`.*?image/(.*?);.*`', '$1', $imageBuffer);

        $imageBuffer = preg_replace('`(.*?,)`', '', $imageBuffer);
        $imageBinary = base64_decode($imageBuffer);

        $fileName = uniqid().'.'.$extension;
        $imageFile = $filepath.'/'.$fileName;

        file_put_contents($imageFile, $imageBinary);

        return $imageFile;
    }



    public function getProjectById($id)
    {
        return $this->wordpressClient->getCategoryById($id);
    }


    public function addPhoto($projectId, $imageFilepath, $legend ='')
    {
        $imageData = json_decode($this->wordpressClient->postImage($imageFilepath));

        $src = $imageData->media_details->sizes->full->source_url;

        $html='
            <div><img src="'.$src.'"/><p>'.$legend.'</p></div>
        ';

        $title = date('Y-m-d H:i');

        $articleData = json_decode(
            $this->wordpressClient->postArticle(
                $title,
                $html,
                array($projectId),
                array(
                    'featured_media' => $imageData->id
                )
            )
        );

        return array(
           'image' => $imageData,
            'article' => $articleData
        );
    }


    public function create($projectName, $projectDescription, $imageFilepath, $parentCategory = null) {

        //creation de la catégorie projet associée

        $slug="(".date('Y-m-d H:i').") ".$this->normalize($projectName);

        $categoryData = json_decode(
            $this->wordpressClient->postCategory($projectName, $projectDescription, $slug, $parentCategory)
        );


        //envoie de l'image
        $imageData = json_decode($this->wordpressClient->postImage($imageFilepath));


        //envoie de l'article
        $src = $imageData->media_details->sizes->full->source_url;

        $html='
            <div><img src="'.$src.'"/><p>'.$projectDescription.'</p></div>
        ';

        $title = $projectName.' : Démarrage';

        $articleData = json_decode(
            $this->wordpressClient->postArticle(
                $title,
                $html,
                array($categoryData->id),
                array(
                    'featured_media' => $imageData->id
                )
            )
        );

        return array(
            'category' => $categoryData,
            'image' => $imageData,
            'article' => $articleData
        );
    }

    protected function getWordpressClient()
    {
        $server = $this->application->get('wordpress')->get('client');
        return $server;

    }


    protected function normalize($string)
    {
        $slugify = new Slugify();
        return $slugify->slugify($string);
    }


}

