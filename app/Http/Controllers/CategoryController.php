<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return response()->json(
            $this->categoryService->getAll()
        );
    }

    public function store(StoreCategoryRequest $request)
    {
        return response()->json(
            $this->categoryService->create([
                'name' => $request->name
            ])
        );
    }

    public function show(string $id)
    {
        return response()->json(
            $this->categoryService->findById($id)
        );
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        return response()->json(
            $this->categoryService->update($id, [
                'name' => $request->name
            ])
        );
    }

    public function destroy(string $id)
    {
        $this->categoryService->delete($id);

        return response()->json([
            'message' => 'Category deleted'
        ]);
    }
}