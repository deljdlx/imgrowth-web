<?php

namespace ImGrowth;

use GuzzleHttp\Exception\BadResponseException;
use League\OAuth1\Client\Credentials\TokenCredentials;
use League\OAuth1\Client\Server\Server;
use Phi\Application\Application;


class WordpressOAuth extends Server
{


    protected $URLRoot;
    protected $mediaURI = '/media';
    protected $postURI = '/posts';
    protected $tagURI = '/tags';
    protected $categoryURI = '/categories';

    protected $token;


    public function setURLRoot($url)
    {
        $this->URLRoot = $url;
        return $this;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }


    public function request($url, TokenCredentials $tokenCredentials, $method = 'GET', $body='', $contentType='application/json', $additionalHeaders = array())
    {

        $client = $this->createHttpClient();

        $headers = $this->getHeaders($tokenCredentials, $method, $url);
        $headers['Content-type'] = $contentType;
        $headers = array_merge($headers, $additionalHeaders);

        try {
            $response = $client->$method($url, [
                'headers' => $headers,
                'body' => $body
            ]);


            return $response->getBody()->getContents();


        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $body = $response->getBody();
            $statusCode = $response->getStatusCode();

            throw new \Exception(
                "Received error [$body] with status code [$statusCode] when retrieving token credentials."
            );
        }
    }

    public function postImage($imageFilepath)
    {
        $data =file_get_contents($imageFilepath);
        $imageMeta = getimagesize($imageFilepath);

        $mime = $imageMeta['mime'];

        $headers = array(
            "content-disposition" => "attachment; filename=".basename($imageFilepath),
        );

        return $this->request(
            $this->URLRoot.$this->mediaURI,
            $this->token,
            'post',
            $data,
            $mime,
            $headers
        );
    }

    public function postArticle($title, $content, $categories = array(), $options = array())
    {

        $data = array(
            'title' => $title,
            'content' => $content,
            'status' => 'publish',
            'categories' => $categories,
        );

        $data = array_merge($data, $options);

        return $this->request(
            $this->URLRoot.$this->postURI,
            $this->token,
            'post',
            json_encode($data)
        );
    }

    public function postTag($name, $description)
    {

        $data = json_encode(array(
            'name' => $name,
            'description' => $description,
        ));

        return $this->request(
            $this->URLRoot.$this->tagURI,
            $this->token,
            'post',
            $data
        );
    }



    public function postCategory($name, $description, $slug = null , $parentId = null)
    {
        $data = array(
            'name' => $name,
            'description' => $description,
            'parent' => $parentId,
        );

        if($slug) {
            $data['slug'] = $slug;
        }

        $data =json_encode($data);

        return $this->request(
            $this->URLRoot.$this->categoryURI,
            $this->token,
            'post',
            $data
        );
    }

    public function getCategoryById($id)
    {
        $requestURL = $this->URLRoot.'/categories?id='.$id;
        $json = file_get_contents($requestURL);

        $data=json_decode($json);

        if(!empty($data)) {
            return $data[0];
        }

        return null;
    }





    /**
     * {@inheritDoc}
     */
    public function urlTemporaryCredentials()
    {
        $application = Application::getInstance();
        return $application->get('wordpressOAuthTemporaryCredentialURL');
        //return 'http://imgrowth.jlb.ninja/oauth1/request';
    }

    /**
     * {@inheritDoc}
     */
    public function urlAuthorization()
    {
        $application = Application::getInstance();
        return $application->get('wordpressOAuthAuthorizationURL');

        //return 'http://imgrowth.jlb.ninja/oauth1/authorize';
    }

    /**
     * {@inheritDoc}
     */
    public function urlTokenCredentials()
    {
        $application = Application::getInstance();
        return $application->get('wordpressOAuthTokenCredentialURL');

        //return 'http://imgrowth.jlb.ninja/oauth1/access';
    }

    /**
     * {@inheritDoc}
     */
    public function urlUserDetails()
    {
        return null;
        //return 'https://api.twitter.com/1.1/account/verify_credentials.json?include_email=true';
    }

    /**
     * {@inheritDoc}
     */
    public function userDetails($data, TokenCredentials $tokenCredentials)
    {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function userUid($data, TokenCredentials $tokenCredentials)
    {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function userEmail($data, TokenCredentials $tokenCredentials)
    {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function userScreenName($data, TokenCredentials $tokenCredentials)
    {
        return null;
    }
}

