<h5 class="bg-success text-white p-2">Add Category </h5>
<hr>
<form>
    <div class="form-group mb-3">
        <label for="categoryName">Name:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="categoryName"
            placeholder="Enter Name" wire:model="name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="categoryDescription">Description:</label>
        <textarea class="form-control @error('description') is-invalid @enderror"  rows="5" id="categoryDescription"
            wire:model="description" placeholder="Enter Description"></textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        @if ($image)
     <img src="{{ $image->temporaryUrl() }}" class="h-20 w-40">
 @endif
       <br>
        <label for="image">Image:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
            wire:model="image">
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
    </div>
</form>
