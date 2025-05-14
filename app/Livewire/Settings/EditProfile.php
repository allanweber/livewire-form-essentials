<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use App\Livewire\Forms\ProfileForm;

class EditProfile extends Component
{
    public ProfileForm $form;

    public $showSuccessIndicator = false;

    public function mount()
    {
        $this->form->setUser(auth()->user());
    }

    public function save(){
        $this->form->update();
        $this->showSuccessIndicator = true;
    }

    public function render()
    {
        return view('livewire.settings.edit-profile');
    }
}
