<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Traits\FileHandler;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class InfoUser extends Component
{
    use WithFileUploads;
    use FileHandler;
    public $name, $email ,$mobile, $image ,$user ,$message = '';

    public function mount(){
        $this->user =  Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->mobile = $this->user->mobile;
    }
    public function render()
    {
        return view('livewire.profile.info-user');
    }

    //validate
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|',
            'mobile' => 'required|string|min:10|max:15',
            'image' => 'nullable|image|max:1024',
        ];
    }
    // update profile

    public function updateProfile(){
        $data = $this->validate();
        if($this->image !=null){
            $path= $this->image =  $this->upload_file($this->image, ('users'));
            $data['image'] = $path;
        }else{
            $data['image'] = $this->user->image;
        }
        $this->user->update($data);
        $this->image = '';
        $this->emit('updated');
        session()->flash('success', 'Item updated  sucessfully');
    }
}
