<?php

namespace App\Http\Controllers;

use App\Filter\PostFilter;
use App\Model\Category;
use App\Model\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postFilter;

    public function __construct()
    {
        $this->postFilter = app(PostFilter::class);
    }

    public function index()
    {
        return view('welcome');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $query = Post::query();
        $search = $request->get('search', '');
        $searchKey = $request->get('searchKey', '');

        if (!empty($search) && !empty($searchKey)){
            $query = $this->postFilter->search($query, $search, $searchKey);
        }

        $posts = $query->with('category')->get();

        return view('posts.list',compact('posts'));
    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
