<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    use ApiResponse;

    public $request;

    public $authorService;

    public function __construct(Request $request, AuthorService $authorService)
    {
        $this->request = $request;
        $this->authorService = $authorService;
    }

    public function index()
    {
        return ApiResponse::success($this->authorService->all());
    }

    public function store()
    {
        return ApiResponse::success($this->authorService->new($this->request->all()));
    }

    public function show($id)
    {
        return ApiResponse::success($this->authorService->detail($id));
    }

    public function update($id)
    {
        return ApiResponse::success($this->authorService->update($id, $this->request->all()));
    }

    public function destroy($id)
    {
        return ApiResponse::success($this->authorService->delete($id));
    }
}
