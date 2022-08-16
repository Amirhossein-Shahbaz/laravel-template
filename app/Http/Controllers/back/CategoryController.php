<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(5);
        return view('back.categories.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('back.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $ValidateData = $request->validate([
            'name' => ['required', 'max:255'],
            'slug' => ['required', 'min:10', 'unique:categories'],
        ]);

        $category = new Category();

        $category->create($request->all());

        $mes = 'Category added successfully';
        return redirect()->route('admin.categories')->with('message', $mes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('back.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $ValidateData = $request->validate([
            'name' => ['required', 'max:255'],
            'slug' => ['required', 'min:10', 'unique:categories'],
        ]);

        $category = new Category();

        $category->update($request->all());

        $mes = 'Update has been done successfully';
        return redirect()->route('admin.categories', compact('category'))->with('message', $mes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $mes = 'Delete has been done successfully';
        return redirect()->route('admin.categories', compact('category'))->with('message', $mes);
    }
}
