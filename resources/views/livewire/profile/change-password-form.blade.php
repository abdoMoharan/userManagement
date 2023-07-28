<div>
    @include('admin.layouts.message')
    <form wire:submit.prevent="changePassword">
        <div>
            <label for="old_password">Old Password</label>
            <input type="password" id="old_password" wire:model.defer="old_password" class="form-control">
            @error('old_password') <span class="text-danger error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="password">New Password</label>
            <input type="password" id="password" wire:model.defer="password" class="form-control">
            @error('password') <span class="text-danger error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" id="password_confirmation " wire:model.defer="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-success float-right mt-2">Change Password</button>
    </form>
</div>
