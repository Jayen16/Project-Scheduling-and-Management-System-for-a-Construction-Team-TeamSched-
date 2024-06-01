@section('noSidebar')
@endsection
<div class="container-fluid bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="bg-white p-4 rounded-lg shadow-lg" style="width: 25rem;">

        <h3 class="font-weight-bold mb-4 text-dark text-center">TEAMSCHED <br></h3>
        <h5 class="font-weight-bold mb-4 text-dark text-center">Login</h5>

        <form>
            <div class="form-group mb-4">
                <label for="email" class="text-sm font-weight-bold text-gray-700 mb-1">Username</label>
                <input wire:model="email" placeholder="enter username" type="email" class="form-control">

                @error('email')
                    <p class="text-sm text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="password" class="text-sm font-weight-bold text-gray-700 mb-1">Password</label>
                <input wire:model="password" placeholder="enter password" type="password" class="form-control">

                @error('password')
                    <p class="text-sm text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>

            @error('login_failed')
                <p class="text-sm text-danger mt-1">{{ $message }}</p>
            @enderror

            <button type="button" wire:click="login" class="btn btn-primary w-100">
                Login
            </button>
        </form>
    </div>
</div>
