<div class="container p-5 d-flex justify-content-center align-items-center">
    <div class="col-md-6 mx-auto bg-light p-4 rounded-shadow">
        <h2 class="mb-3 text-center">Login</h2>
        <form wire:submit.prevent="Login">
            <div class="mb-3">
                <label for="email"  class="form-label">Email Address</label>
                <input type="text" wire:model="email" class="form-control" id="email" placeholder="Enter email">
                @error('email') <span class="error text-danger ms-2 p-1">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" wire:model="password" class="form-control" id="password"
                       placeholder="Enter password">
                @error('password') <span class="error text-danger ms-2 p-1">{{ $message }}</span> @enderror
            </div>
            <div class="d-flex align-items-center mb-3">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label for="rememberMe" class="form-check-label ms-2">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

    </div>
</div>
