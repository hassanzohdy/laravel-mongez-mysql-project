<?php
namespace App\Services\Movies\Helpers;

use GuzzleHttp\Client;

class MoviesApi
{
    /**
     * Base url of movies database api
     *
     * @const string
     */
    const BASE_URL = 'https://api.themoviedb.org/3/';

    /**
     * Client object of guzzle
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * API key
     *
     * @var string $authKey
     */
    protected $apiKey;

    /**
     * Required query string
     *
     * @var $array
     */
    public $requiredQueryString = [];

    /**
     * Set up the client object of Guzzle
     *
     * @param array $options
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->requiredQueryString ['api_key']  = env('MOVIE_DB_API_KEY');
    }

    /**
     * Send Request
     *
     * @param string $url
     * @param string $method
     * @param array $body
     * @param array $headers
     * @param array $options
     *
     * @return object
     */
    public function sendRequest($url, $httpMethod, $body, $headers, $options = [])
    {
        $url = $this->queryBuilder(static::BASE_URL .$url, array_merge($options, $this->requiredQueryString));

        $response = $this->client->$httpMethod($url, [
            'headers' =>   $headers
        ]);

        return json_decode($response->getBody());
    }

    /**
     * Query string builder
     *
     * @param string $string
     * @param array $options
     * @return string
     */
    public function queryBuilder($url ,$options)
    {
        return $url ."?" .http_build_query($options, "?" , "&");
    }

    /**
     * Fetch data from specific method
     *
     * @param array $options;
     * @return string
     */
    public function fetch($options = [])
    {
        return $this->sendRequest(static::METHOD_CONFIG['url'], static::METHOD_CONFIG['httpVerb'], static::METHOD_CONFIG['body'], static::METHOD_CONFIG['headers'], $options);
    }

}
