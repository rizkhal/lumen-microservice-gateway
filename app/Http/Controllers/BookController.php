<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\BookService;

class BookController extends Controller
{
    use ApiResponse;

    public $request;

    public $bookService;

    public function __construct(Request $request, BookService $bookService)
    {
        $this->request = $request;
        $this->bookService = $bookService;
    }

    public function index()
    {
        return ApiResponse::success($this->bookService->all());
    }

    public function store()
    {
        return ApiResponse::success($this->bookService->new($this->request->all()));
    }

    public function show($id)
    {
        return ApiResponse::success($this->bookService->detail($id));
    }

    public function update($id)
    {
        return ApiResponse::success($this->bookService->update($id, $this->request->all()));
    }

    public function destroy($id)
    {
        return ApiResponse::success($this->bookService->delete($id));
    }
}
