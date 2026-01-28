<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $service) {}

    public function index()
    {
        return CategoryResource::collection(
            Category::with('children')->get()
        );
    }

    public function store(StoreCategoryRequest $request)
    {
        return new CategoryResource(
            $this->service->store($request->validated())
        );
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        return new CategoryResource(
            $this->service->update($category, $request->validated())
        );
    }

    public function destroy(Category $category)
    {
        $this->service->delete($category);
        return response()->noContent();
    }
}
