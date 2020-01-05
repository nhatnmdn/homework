<?php

namespace App\Http\Controllers;

use App\Filter\CategoryFilter;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller

{

    protected $categoryFilter;

    public function __construct()
    {
        $this->categoryFilter = app(CategoryFilter::class);
    }
    public function index()
    {
        return view('category.index');
    }


    public function create()
    {
        return view('category.create');
    }


    public function store(Request $request)
    {
        $params = $request->except('_token');

        Category::create($params);

        return redirect(route('category.list'));
    }


    public function show(Request $request)
    {
        $query = Category::query();
        $search = $request->get('search','');
        $searchKey = $request->get('searchKey', '');

        if (!empty($search) && !empty($searchKey)){
            $query = $this->categoryFilter->search($query, $search, $searchKey);
        }

        $categories = $query->get();

        return view('category.list', compact('categories'));
    }


    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $params = $request->except('_token');

        Category::find($id)->update($params);

        return redirect(route('category.list'))->with('success','Cập nhật thành công');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect(route('category.list'))->with('success','Xóa thành công');
    }
}
