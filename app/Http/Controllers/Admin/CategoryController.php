<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\CategoryForRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryForRequest $request)
    {
       $data = $request->validated();

       $category = new Category;

       $category->name =  $data['name'];
       $category->slug =  $data['slug'];
       $category->description =  $data['description'];

       if($request->hasFile('image')){
        $file = $request->file('image');
        $ext = $file ->getClientOriginalExtension();
        $fileName = time().'.'.$ext;
        $path = 'uploads/category/';
        $file->move($path,$fileName);
        $category->image =  $path.$fileName;
       }
      

       $category->meta_title =  $data['meta_title'];
       $category->meta_keyword =  $data['meta_keyword'];
       $category->meta_description =  $data['meta_description'];

       $category->status =  isset($data['status']) && $data['status'] == true ? '0':'1';

       $category->save();
       return  redirect('admin/category')
       ->with('msg','New category created successfully ! ')
       ->with('color','success');
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
    public function edit(Category $category)
    {
       return view('admin.category.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryForRequest $request, $id)
    {
       $data = $request->validated();
       
       $category =  Category::findOrFail($id);

       $category->name =  $data['name'];
       $category->slug =  $data['slug'];
       $category->description =  $data['description'];

       if($request->hasFile('image')){
        $path =  $category->image;
        if(File::exists($path))File::delete($path);
        $file = $request->file('image');
        $ext = $file ->getClientOriginalExtension();
        $fileName = time().'.'.$ext;
        $path = 'uploads/category/';
        $file->move($path,$fileName);
        $category->image =  $path.$fileName;
       }
      

       $category->meta_title =  $data['meta_title'];
       $category->meta_keyword =  $data['meta_keyword'];
       $category->meta_description =  $data['meta_description'];

       $category->status =  isset($data['status']) && $data['status'] == true ? '0':'1';

       $category->update();
       return  redirect('admin/category')
       ->with('msg','Category ubdated successfully ! ')
       ->with('color','success');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
