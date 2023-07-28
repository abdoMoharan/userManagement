<?php

namespace App\Http\Livewire\Profile;

use Hash;
use Livewire\Component;

class ChangePasswordForm extends Component
{
    public $old_password;
    public $password;
    public $password_confirmation;
    public function render()
    {
        return view('livewire.profile.change-password-form');
    }
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function changePassword()
    {
        $validatedData = $this->validate();

        if (!Hash::check($this->old_password, auth()->user()->password)) {
            $this->addError('old_password', 'The old password is incorrect.');
            return;
        }

        auth()->user()->update([
            'password' => \Hash::make($this->password),
        ]);

        session()->flash('success', 'Password updated successfully!');
        $this->reset();
    }
}
