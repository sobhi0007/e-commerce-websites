<?php

namespace App\Http\Livewire\Admin\Category;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Category;
class Index extends Component
{

    public $category_id;
    public function deleteCategory($category_id)
    {
        $this->$category_id=  $category_id;
    }

    public function destroyCategory()
    {
        $category =  Category::find($this->$category_id); 
        $category->delete();
    }



    public function counter()
    {
        $this->counter_id++;
    }

    public function render()
    {   $categories =  Category::paginate(2);
        return view('livewire.admin.category.index', compact('categories'));
    }

    

}
