<?php
namespace App\Modules\Movies\Filters;

use HZ\Illuminate\Mongez\Helpers\Filters\MYSQL\Filter;

class Movie extends Filter
{
    /**
     * List with all filter.
     *
     * Movie => functionName
     * @const array
     */
    const FILTER_MAP = [];
}
