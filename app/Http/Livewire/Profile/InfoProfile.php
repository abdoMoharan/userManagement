<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class InfoProfile extends Component
{
    public $user;
    protected $listeners = ['updated' => '$refresh'];
    public function mount(){
        $this->user =  Auth::user();

    }
    public function render()
    {
        return view('livewire.profile.info-profile');
    }
}
