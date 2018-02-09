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



        $router->get('oauth/wordpress', '`/oauth/wordpress$`', function () use ($application) {

            $server = $application->getContainer()->get('wordpressOAuth');
            $session = $application->getContainer()->get('session');

            $temporaryCredentials = $server->getTemporaryCredentials();

            // Store the credentials in the session.
            $session->set('temporary_credentials', serialize($temporaryCredentials));

            $server->authorize($temporaryCredentials);

        });


        $router->get('oauth/wordpress/callback', '`/oauth/wordpress/callback`', function () use ($application) {

            $server = $application->getContainer()->get('wordpressOAuth');
            $session = $application->getContainer()->get('session');


            $temporaryCredentials = unserialize($session->get('temporary_credentials'));
            $tokenCredentials = $server->getTokenCredentials($temporaryCredentials, $_GET['oauth_token'], $_GET['oauth_verifier']);
            $session->delete('temporary_credentials');
            $session->set('wordpress_token', serialize($tokenCredentials));

            file_put_contents(APPLICATION_ROOT.'/data/wordpress-token.txt', serialize($tokenCredentials));

            $session->close();
        });






        $router->post('photo/post', '`/photo/post`', function () use ($application) {


            $data = $_POST['photo'];
            $extension  = preg_replace('`.*?image/(.*?);.*`', '$1', $data);

            $imageData = preg_replace('`(.*?,)`', '', $data);
            $imageBinary = base64_decode($imageData);

            $fileName = uniqid().'.'.$extension;
            $destination = APPLICATION_ROOT."/www/content/photo/".$fileName;
            file_put_contents($destination, $imageBinary);


            $token = unserialize(file_get_contents(APPLICATION_ROOT.'/data/wordpress-token.txt'));



            $server = $application->getContainer()->get('wordpressOAuth');
            $server->setToken($token);

            $content = $server->postImage($destination);
            $imageData = json_decode($content);



            $node = $application->getContainer()->get('nodeService');

            $nodeData = $node->getData();



            $src = $imageData->media_details->sizes->medium->source_url;
            $html='<div><img src="'.$src.'"/></div>
                <ul>
                    <li>Temperature : '.$nodeData->data->temperature.'°C</li>
                    <li>Lumière : '.$nodeData->data->light.' lux</li>
                </ul>
            ';

            $title = date('Y-m-d H:i')." I'm Growth !";

            $server->postArticle($title, $html);

            echo json_encode(getimagesize($destination));


        })->json();


        return $router;
    }


}
