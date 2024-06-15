<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Register extends Component
{
    public $username = "";
    public $password = "";

    public function register()
    {
        $this->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user
        $user = User::create([
            'username' => $this->username,
            'password' => Hash::make($this->password),
        ]);

        // Log the user in after registration
        Auth::login($user);

        return $this->redirect('/dashboard', navigate: true);
    }


    #[Title('Register')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
