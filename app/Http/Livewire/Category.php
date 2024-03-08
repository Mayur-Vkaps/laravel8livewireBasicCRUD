<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Category as Categories;
use Illuminate\Support\Facades\Storage;
class Category extends Component
{
    use WithPagination;
    use WithFileUploads;
    public  $name, $description, $category_id, $image;
    public $updateCategory = false;
    public $oldImage;
    protected $listeners = [
        'deleteCategory' => 'destroy'
    ];
    public function render()
    {
        $categories = Categories::all();
        //$categories = Categories::paginate(3);
        return view('livewire.category', compact('categories'));
    }
    public function updated()
    {
        if ($this->updateCategory) {
            $this->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
        } else {
            $this->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }
    }
    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->image = null;
    }
    public function store()
    {
        // Validate Form Request
        $this->updated();
        try {
            // Create Category
            Categories::create([
                'name' => $this->name,
                'description' => $this->description,
                'image' => $this->image->store('uploads', 'public'),
            ]);
            // Set Flash Message
            session()->flash('success', 'Category Created Successfully!!');
            // Reset Form Fields After Creating Category
            $this->resetFields();
        } catch (\Exception $e) {
            // Set Flash Message
            session()->flash('error', 'Something goes wrong while creating category!!');
            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
    }
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        $this->name = $category->name;
        $this->description = $category->description;
        $this->category_id = $category->id;
        $this->oldImage = $category->image;
        $this->updateCategory = true;
    }
    public function cancel()
    {
        $this->updateCategory = false;
        $this->resetFields();
    }
    public function update()
    {
        // Validate request
        $this->updated();
        try {
            $category = Categories::findOrFail($this->category_id);
            // Update category
            if ($this->image) {
                //dd('test');
                Categories::find($this->category_id)->fill([
                    'name' => $this->name,
                    'description' => $this->description,
                    'image' => $this->image->store('uploads', 'public'),
                ])->save();
            } else {
                Categories::find($this->category_id)->update([
                    'name' => $this->name,
                    'description' => $this->description,
                    // 'image'=>$category->image,
                ]);
            }
            //dd('test');
            session()->flash('success', 'Category Updated Successfully!!');
            $this->cancel();
        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong while updating category!!');
            $this->cancel();
        }
    }
    public function destroy($id)
    {
        try {
            Categories::find($id)->delete();
            session()->flash('success', "Category Deleted Successfully!!");
        } catch (\Exception $e) {
            session()->flash('error', "Something goes wrong while deleting category!!");
        }
    }
}
