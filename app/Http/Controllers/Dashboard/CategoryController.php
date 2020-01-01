<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $categories=Category::when($request->search,function($q) use($request){
           return $q->whereTranslationLike('name','%'.$request->search.'%');
        })->paginate(5);
        return view('dashboard.categories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=[];
        foreach(config('translatable.locales') as $local)
        {
            $rules+=[$local.'.name'=>['required',Rule::unique('category_translations','name')]];
        }

        $request->validate($rules);
       

        Category::create($request->all());
       
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.categories.index');
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules=[];
        foreach(config('translatable.locales') as $local)
        {
            $rules+=[$local.'.name'=>['required',Rule::unique('category_translations','name')->ignore($category->id)]];
        }

        $request->validate($rules);

        $category->update($request->all());
        session()->flash('success',__('site.updated_successfully'));
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success',__('site.delete_successfully'));
        return redirect()->route('dashboard.categories.index');
    }
}
