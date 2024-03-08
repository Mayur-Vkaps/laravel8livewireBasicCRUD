<h5 class="bg-primary text-white p-2">Edit Category </h5>
<hr>
<form>
    <input type="hidden" wire:model="category_id">
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
        <textarea class="form-control @error('description') is-invalid @enderror" rows="5" id="categoryDescription"
            wire:model="description" placeholder="Enter Description"></textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        @if ($oldImage)
            <h5>Old Image</h5>
            <img src="{{ Storage::url($oldImage) }}" alt="" class="h-20 w-40" width="100px" height="100px">
        @endif
        @if ($image)
            <h5>New Image</h5>
            <img src="{{ $image->temporaryUrl() }}" class="h-20 w-40" width="100px" height="100px">
        @endif
        <br> <label for="image">Image(Optional):</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
            wire:model="image">
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex justify-content-between">
        <button wire:click.prevent="update()" class="btn btn-primary btn-block">Save</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    </div>
</form>
