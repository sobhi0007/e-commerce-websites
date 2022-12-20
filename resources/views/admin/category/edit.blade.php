
@extends('layouts.admin')
@section('content')
 <div class="container col-10 card-header p-2 rounded ">
    <div class="row">
      <div class="col-8">
         <h2 class="">Edit Category</h2>
      </div>
      <div class="col-4 text-end ">
         <a href="{{url()->previous()}}" class=" text-light btn btn-danger btn-sm rounded shadow">Back</a>
      </div>
    </div>
 </div>
 <div class="container col-10 bg-light p-2 my-2 rounded ">
   <form method="POST" action="{{url('admin/category/'.$category->id)}}"  enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
         <div class="col-6 my-2"> 
            <label for="name">Name</label>
            <input  type="text" class="rounded @error('name') is-invalid  @enderror form-control form-control-sm" id="name" name="name" value="{{ $category->name}}">
         @error('name')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>
         <div class="col-6 my-2"> 
            <label for="slug">Slug</label>
            <input  type="text" class="rounded @error('slug') is-invalid @enderror form-control form-control-sm" id="slug" name="slug" value="{{ $category->slug}}">
         @error('slug')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>
         <div class=" col-12 my-2">
            <label for="description">Description</label>
            <textarea class=" rounded @error('description') is-invalid @enderror form-control form-control-sm" id="description" name="description" rows="3" >{{$category->description}}</textarea>
         @error('description')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>
         <div class="col-md-4 col-12 my-2"> 
            <label for="meta_title">Meta Title</label>
            <input  type="text" class="rounded @error('meta_title') is-invalid @enderror form-control form-control-sm" id="meta_title" name="meta_title" value="{{ $category->meta_title}}">
         @error('meta_title')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>
         <div class="col-md-4 col-12 my-2"> 
            <label for="meta_keyword">Meta keyword</label>
            <input  type="text" class="rounded @error('meta_keyword') is-invalid @enderror form-control form-control-sm" id="meta_keyword" name="meta_keyword" value="{{ $category->meta_keyword}}">
         @error('meta_keyword')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>
         <div class="col-md-4 col-12 my-2"> 
            <label for="meta_description">Meta Description</label>
            <input  type="text" class="rounded @error('meta_description') is-invalid @enderror form-control form-control-sm" id="meta_description" name="meta_description" value="{{ $category->meta_description}}">
         @error('meta_description')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>
         <div class="col-12 my-2"> 
            <label for="image">Image</label>
            <input  type="file" class="rounded @error('image') is-invalid @enderror form-control form-control-sm" id="image" name="image" >
            <img src="{{asset($category->image)}}" alt="" srcset="">
            @error('image')
               <small class="fw-bold   text-danger">{{ $message }}</small>
            @enderror
         </div>
         <div class="form-check col-12 my-2 mx-3"> 
           
          <label class="form-check-label ml-3" for="status">
            <input class="form-check-input" type="checkbox" name="status" value="1" id="status" @checked($category->status == 0)>
               Category visibility off
            </label>
         </div>
      </div>
      <div class="text-end">
         <button type="submit" class="btn btn-primary btn-sm text-light my-2 ">Submit</button>
      </div>
      
    </form>
</div>
@endsection