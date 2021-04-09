<?php
namespace App\Services\Movies\AvailableMethods;

use App\Services\Movies\Helpers\MoviesApi;
use App\Services\Movies\Contracts\MethodInterface;

class TopRated extends MoviesApi implements MethodInterface
{

    /**
     * Method Config
     *
     * @const array
     */
    const METHOD_CONFIG = [
        'url' => 'movie/top_rated',
        'httpVerb' => 'GET',
        'body' => [],
        'headers' => [
            'User-Agent' => 'curl/7.65.3',
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
        ]
    ];
}
