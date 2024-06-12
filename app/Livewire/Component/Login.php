<?php

namespace App\Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    public $username = "";
    public $password = "";

    // Log the user in
    public function login()
    {
        $this->validate([
            'username' => 'required|string|exists:users,username',
            'password' => 'required|string|min:6',
        ]);

        // Check if the user has too many login attempts
        if (RateLimiter::tooManyAttempts(request()->ip(), 10)) {
            $seconds = RateLimiter::availableIn(request()->ip(), 10);

            throw ValidationException::withMessages(['login_failed' => "Too many login attempts. Please try again in $seconds seconds."]);
        }

        // Get user by username
        $user = User::where('username', $this->username)->first();

        // Check if the user exists and the password is correct
        if (!$user || !Hash::check($this->password, $user->password)) {
            RateLimiter::hit(request()->ip());

            // Set validation error to be viewed in blade
            throw ValidationException::withMessages(['login_failed' => 'Invalid username or password. Please try again.']);
        }

        // Clear login attempts
        RateLimiter::clear(request()->ip());

        // Login the user
        Auth::login($user);

        return $this->redirect('/dashboard', navigate: true);
    }
    public function render()
    {
        return view('livewire.component.login');
    }
}
