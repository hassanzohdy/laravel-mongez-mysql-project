<?php
namespace App\Services\Movies\Contracts;

Interface MethodInterface
{
    /**
     * Fetch data from method API
     *
     * @param array $options
     * @return string $data
     */
    public function fetch($options);
}
