<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileForm extends Form
{
    public User $user;

    // #[Validate('required|max: 255')]
    #[Validate] //Trigger validation on  blur
    public string $name = '';

    // #[Validate('nullable')]
    // #[Validate('max: 500')]
    #[Validate] //Trigger validation on  blur
    public ?string $bio = '';

    public function rules()
    {
        return [
            'name' => [
                'required',
                'max:255',
                'string',
                Rule::unique('users')->ignore($this->user),
            ],
            'bio' => 'nullable|max:500',
        ];
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->bio = $user->bio;
    }

    public function update()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'bio' => $this->bio,
        ]);
    }
}
