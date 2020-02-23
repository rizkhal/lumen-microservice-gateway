<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;

class AuthorService
{
    use ConsumeExternalServices;

    /**
     * Authorization secret key to pass authors API
     * @var string
     */
    public $secret;

    /**
     * Base uri to consume author services
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->secret  = config('services.authors.secret');
        $this->baseUri = config('services.authors.base_uri');
    }

    public function all()
    {
        return $this->performRequest("GET", "api/v1/authors");
    }

    public function new($data)
    {
        return $this->performRequest("POST", "api/v1/authors", $data);
    }

    public function detail($id)
    {
        return $this->performRequest("GET", "api/v1/authors/{$id}");
    }

    public function update($id, $data)
    {
        return $this->performRequest("PUT", "api/v1/authors/{$id}", $data);
    }

    public function delete($id)
    {
        return $this->performRequest("DELETE", "api/v1/authors/{$id}");
    }
}