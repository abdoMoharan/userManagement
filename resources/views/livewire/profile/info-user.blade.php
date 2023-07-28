<div>
    @include('admin.layouts.message')
    <div class="card-body">
        <!------------------------------------Start Name------------------------------------------->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" wire:model.defer="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <!------------------------------------ End Name------------------------------------------->
        <!------------------------------------Start Email------------------------------------------->
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1"
                placeholder="Enter email" wire:model.defer="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <!------------------------------------End Email------------------------------------------->


        <!------------------------------------Start Mobile------------------------------------------->
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="number" class="form-control" id="mobile" placeholder="mobile"
                wire:model.defer="mobile" >
                @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <!------------------------------------End Mobile------------------------------------------->
        <!------------------------------------Start Mobile------------------------------------------->
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" wire:model.defer="image">
            @error('image') <span class="error">{{ $message }}</span> @enderror
        </div>
        <!------------------------------------End Mobile------------------------------------------->

    </div>
    <div class="card-footer">
        <button class="btn btn-success float-right ml-1" wire:click="updateProfile">Update</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary float-right">Back</a>
    </div>
</div>
