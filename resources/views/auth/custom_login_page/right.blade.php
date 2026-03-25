 {{-- RIGHT : LOGIN --}}
 <div class="login-panel">
     <div class="text-center mb-4">
         <h4 class="fw-bold">Secure Login</h4>
         <p class="text-muted">TechnoTech Engineering Ltd</p>
     </div>

     <form method="POST" action="{{ route('login') }}">
         @csrf
         <div class="mb-3">
             <label class="form-label fw-semibold">Email or Username</label>
             <input type="text" name="login" class="form-control form-control-lg"
                 placeholder="Enter email or username">
         </div>

         <div class="mb-4">
             <input id="password" type="password"
                 class="form-control form-control-lg rounded-3 shadow-sm @error('password') is-invalid @enderror"
                 name="password" placeholder="Enter your password" required>

             @error('password')
                 <div class="invalid-feedback d-block mt-1"><strong>{{ $message }}</strong></div>
             @enderror
         </div>

         <button class="btn login-btn w-100 py-2 rounded-pill mt-3">
             Login
         </button>

         <div class="text-center mt-3">
             <a href="{{ route('password.request') }}" id="forgotPasswordLink" class="text-decoration-none">
                 Forgot Password?
             </a>
         </div>

         <hr class="my-4">

         <div class="text-center">
             <a href="javascript:void(0)" id="openProblemBtn" class="text-decoration-none dev-link fw-semibold">
                 ⚠ Facing a system problem?
             </a>
             <p class="text-muted small mt-1">
                 Let us know — our technical team will take care of it.
             </p>
         </div>
     </form>
 </div>
