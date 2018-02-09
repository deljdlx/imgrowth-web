<?php

namespace ImGrowth;

use GuzzleHttp\Exception\BadResponseException;
use League\OAuth1\Client\Credentials\TokenCredentials;
use League\OAuth1\Client\Server\Server;


class WordpressOAuth extends Server
{


    protected $URLRoot;
    protected $mediaURI = '/media';
    protected $postURI = '/posts';

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

    public function postArticle($title, $content)
    {

        $data = json_encode(array(
            'title' => $title,
            'content' => $content,
            'status' => 'publish'
        ));

        return $this->request(
            $this->URLRoot.$this->postURI,
            $this->token,
            'post',
            $data
        );
    }




    /**
     * {@inheritDoc}
     */
    public function urlTemporaryCredentials()
    {
        return 'http://imgrowth.jlb.ninja/oauth1/request';
    }

    /**
     * {@inheritDoc}
     */
    public function urlAuthorization()
    {
        return 'http://imgrowth.jlb.ninja/oauth1/authorize';
    }

    /**
     * {@inheritDoc}
     */
    public function urlTokenCredentials()
    {
        return 'http://imgrowth.jlb.ninja/oauth1/access';
    }

    /**
     * {@inheritDoc}
     */
    public function urlUserDetails()
    {
        return 'https://api.twitter.com/1.1/account/verify_credentials.json?include_email=true';
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

