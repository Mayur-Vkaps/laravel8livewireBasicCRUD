<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session()->get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if($updateCategory)
                        @include('livewire.edit')
                    @else
                        @include('livewire.create')
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="bg-dark p-2 text-white">Category List</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="cat_table">
                            <thead>
                                <tr>
                                    <th>Srno</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>
                                                {{$category->id}}
                                            </td>
                                            <td>
                                                <img src="{{asset('storage/'.$category->image)}}" alt="" width="50px" height="50px">
                                            </td>
                                            <td>
                                                {{$category->name}}
                                            </td>
                                            <td>
                                                {{$category->description}}
                                            </td>
                                            <td>
                                                <button wire:click="edit({{$category->id}})" class="btn btn-primary btn-sm">Edit</button>
                                                <button onclick="deleteCategory({{$category->id}})" class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" align="center">
                                            No Categories Found.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $categories->links( "pagination::bootstrap-4") }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteCategory(id){
        if(confirm("Are you sure to delete this record?"))
            window.livewire.emit('deleteCategory',id);
    }
</script>
