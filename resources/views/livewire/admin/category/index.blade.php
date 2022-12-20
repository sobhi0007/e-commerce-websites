
<div class="container col-10 card-header p-2 rounded ">
    @if (session('msg'))
    <div class="alert alert-{{session('color')}}"><small>{{session('msg')}}</small></div>
    @endif
     <div class="row">
       <div class="col-6">
          <h2>Categories</h2>
       </div>
       <div class="col-6 text-end ">
          <a href="{{url('admin/category/create')}}" class=" text-light btn btn-primary btn-sm rounded shadow">Create New</a>
       </div>
     </div>
</div>    
<div class="container col-10  p-2 rounded ">
     <table class="table bg-light" >
      <thead class="bg-dark text-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
         @foreach ($categories as $category)
            <tr >
               <th scope="row">{{$category->id}}</th>
               <td>{{$category->name}}</td>
               <td>
                @php
                  echo   $category->status==0?'<i class="fa fa-eye-slash text-danger" aria-hidden="true"></i>':'<i class="fa fa-eye text-primary" aria-hidden="true"></i>'
                @endphp</td>
               <td>
                   <form action="{{url('admin/category/'.$category->id)}}" method="POST">
                     <a href="{{url('admin/category/'.$category->id.'/edit/')}}" class="btn btn-primary btn-sm text-light">Update</a>
                 
                     @csrf
                     @method('Delete')
                     <input type="submit" value="Delete"  class="btn btn-danger btn-sm text-light">
                  </form>

               </td>
            </tr>
         @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-end">
      {{$categories->links('pagination::bootstrap-4')}}
    </div>
</div>
