<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        return $this->success(
            Category::all(),
            'Data kategori berhasil ditampilkan'
        );
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create(
            $request->validated()
        );

        return $this->success(
            $category,
            'Kategori berhasil dibuat',
            201
        );
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return $this->error(
                'Kategori tidak ditemukan',
                404
            );
        }

        return $this->success(
            $category,
            'Detail kategori berhasil ditampilkan'
        );
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return $this->error(
                'Kategori tidak ditemukan',
                404
            );
        }

        $category->update(
            $request->validated()
        );

        return $this->success(
            $category,
            'Kategori berhasil diperbarui'
        );
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return $this->error(
                'Kategori tidak ditemukan',
                404
            );
        }

        $category->delete();

        return $this->success(
            null,
            'Kategori berhasil dihapus'
        );
    }
}