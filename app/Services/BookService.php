<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;

class BookService
{
    use ConsumeExternalServices;

    public $secret;

    public $baseUri;

    public function __construct()
    {
        $this->secret  = config('services.books.secret');
        $this->baseUri = config('services.books.base_uri');
    }

    public function all()
    {
        return $this->performRequest("GET", "api/v1/books");
    }

    public function new($data)
    {
        return $this->performRequest("POST", "api/v1/books", $data);
    }

    public function detail($id)
    {
        return $this->performRequest("GET", "api/v1/books/{$id}");
    }

    public function update($id, $data)
    {
        return $this->performRequest("PUT", "api/v1/books/{$id}", $data);
    }

    public function delete($id)
    {
        return $this->performRequest("DELETE", "api/v1/books/{$id}");
    }
}