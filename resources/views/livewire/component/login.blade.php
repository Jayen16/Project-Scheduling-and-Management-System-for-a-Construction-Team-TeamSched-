@section('noSidebar')
@endsection
<div class="position-relative" style="height: 100vh; width: 100vw; overflow: hidden;">
    <img class="position-absolute w-100 h-100" style="object-fit: cover;"
        src="{{ asset('assets/images/construction.jpg') }}" alt="Background Image">
    <div class="position-absolute w-100 h-100" style="background: rgba(0, 0, 0, 0.2);"></div> <!-- Dark overlay -->
    <div class="d-flex align-items-center justify-content-center position-relative" style="height: 100vh; width: 100vw;">
        <div class="bg-white p-4 rounded-lg shadow-lg col-10 col-md-12 " style="max-width: 25rem;">
            <img src="{{ asset('assets/images/teamsched_logo.png') }}" alt="Ronald Codes Logo"
                class="mx-auto d-block mb-2 rounded-circle cursor-pointer" style="width: 100px" />

            <h4 class="font-weight-bold mb-4 text-dark text-center" style="line-height: 1;">
                TEAMSCHED <br>
                <span class="text-sm font-weight-normal">
                    <i>Efficiently managing projects and manpower.</i>
                </span>
            </h4>

            <h5 class="font-weight-bold mb-2 text-dark text-center">Login</h5>

        <form>
            <div class="form-group mb-4">
                <label for="text" class="text-sm font-weight-bold text-gray-700 mb-1">Username</label>
                <input wire:model="username" placeholder="enter username" type="text" class="form-control">

                @error('username')
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
</div>
