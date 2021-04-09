<?php
namespace App\Services\Movies;

use App\Services\Movies\AvailableMethods\Genre;
use App\Services\Movies\AvailableMethods\TopRated;

class Movies
{
    /**
     * Available integrated APIs
     *
     * @const array
     */
    const AVAILABLE_INTEGRATED_APIS = [
        'topRated' =>  TopRated::class,
        'genres' => Genre::class
    ];

    /**
     * Fetch Data from specific method
     *
     * @param string $method
     * @return void
     */
    public function fetch($method, $options = [])
    {
        $methodClass = static::AVAILABLE_INTEGRATED_APIS[$method];
        $methodObject = new $methodClass($options);
        return $methodObject->fetch();
    }
}
