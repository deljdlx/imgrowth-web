<?php

namespace ImGrowth\Configuration\Container;


use Phi\Container\Container;

class WordpressProduction extends Container
{

    public function __construct()
    {


        $this->set('OAuthTokenName', function() {
            //return 'wordpress-local.token.txt';
            return 'wordpress-jlb.ninja.token.txt';
        });


        $this->set('OAuthToken', function() {
            $tokenName = $this->get('OAuthTokenName');
            return APPLICATION_ROOT.'/data/'.$tokenName;
        });



        $this->set('OAuthTemporaryCredentialURL', 'http://imgrowth.jlb.ninja/oauth1/request');
        $this->set('OAuthAuthorizationURL', 'http://imgrowth.jlb.ninja/oauth1/authorize');
        $this->set('OAuthTokenCredentialURL', 'http://imgrowth.jlb.ninja/oauth1/access');

        //$this->set('OAuthTemporaryCredentialURL', 'http://192.168.0.10/project/imgrowth-web/www/content/oauth1/request');
        //$this->set('OAuthAuthorizationURL', 'http://192.168.0.10/project/imgrowth-web/www/content/oauth1/authorize');
        //$this->set('OAuthTokenCredentialURL', 'http://192.168.0.10/project/imgrowth-web/www/content/oauth1/access');




        $this->set('APIURL', function () {
            //return 'http://192.168.0.10/project/imgrowth-web/www/content/wp-json/wp/v2';
            return 'http://imgrowth.jlb.ninja/wp-json/wp/v2';
        });

        $this->set('client', function () {

            //jlb.ninja
            //*
             $server = new \ImGrowth\WordpressOAuth(array(
                 'identifier' => 'W9MgWiN4LB5A',
                 'secret' => 'NoZryXkABLP3yutEmTsf5yMzh9aUfrMD8j0xFJYR35rZryVD',
                 'callback_uri' => "http://192.168.0.10/project/imgrowth-web/www/index.php/oauth/wordpress/callback",
             ));
            //*/



            /*
            $server = new \ImGrowth\WordpressOAuth(array(
                'identifier' => 'KC9KNogOmtrr',
                'secret' => 'arMw6TF2pE6CPhG0r5Q7CwVVkuyWujKrXJKfpD8IbONNAsJX',
                'callback_uri' => "http://192.168.0.10/project/imgrowth-web/www/index.php/oauth/wordpress/callback",
            ));
            //*/
            $token = unserialize(file_get_contents($this->get('OAuthToken')));
            $server->setToken($token);
            $server->setURLRoot($this->get('APIURL'));


            return $server;
        });



        $this->set('projectCategory', function() {

            $requestURL = $this->get('APIURL').'/categories?slug=imgrowth-project';
            $json = file_get_contents($requestURL);

            $data=json_decode($json);

            if(!empty($data)) {
                return $data[0];
            }
            else {
                $client = $this->get('client');
                $json = $client->postCategory(
                   'Projet',
                   '',
                   'imgrowth-project'
                );
                return json_decode($json);
            }



            //$client = $this->get('client');
            //$client->getCategory();
        });







    }


}