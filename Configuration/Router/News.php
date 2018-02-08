<?php

namespace ImGrowth\Configuration\Router;



use Phi\Application\Application;
use Phi\Routing\Interfaces\Router;


//phpinfo();
//die('EXIT '.__FILE__.'@'.__LINE__);

class  News
{

    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }



    public function registerRoutes(Router$router) {

        $application = $this->application;

        $router->get('ff', '`/ff`', function () use ($application) {


            $data = file_get_contents(__DIR__.'/dump.php');



            //file_put_contents(__DIR__.'/dump.php', $data);

            $imageMime = preg_replace('`(.*?,).*`', '$1', $data);

            $extension  = preg_replace('`.*?image/(.*?);.*`', '$1', $data);

            $imageData = str_replace($imageMime, '', $data);
            $imageBinary = base64_decode($imageData);

            die('EXIT '.__FILE__.'@'.__LINE__);

            header('Content-type: image/jpeg');
            echo $imageBinary;

            /*
            $fileName = uniqid().'.'.$extension;
            $destination = APPLICATION_ROOT."/www/content/photo/".$fileName;
            file_put_contents($destination, imageBinary);


            header('Content-type: application/json');
            echo json_encode(getimagesize($destination));
            */


        });

        $router->post('photo/post', '`/photo/post`', function () use ($application) {


            $data = $_POST['photo'];

            file_put_contents(__DIR__.'/dump.php', $data);

            //$imageMime = preg_replace('`(.*?,).*`', '$1', $data);
            $extension  = preg_replace('`.*?image/(.*?);.*`', '$1', $data);

            $imageData = preg_replace('`(.*?,)`', '', $data);
            $imageBinary = base64_decode($imageData);

            $fileName = uniqid().'.'.$extension;
            $destination = APPLICATION_ROOT."/www/content/photo/".$fileName;
            file_put_contents($destination, $imageBinary);


            header('Content-type: application/json');
            echo json_encode(getimagesize($destination));


        });


        return $router;
    }


}
