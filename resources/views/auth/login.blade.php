<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #e0e7ee 0%, #f8fafc 100%); font-family: 'Segoe UI', Arial, sans-serif;">
    <div style="background: #fff; box-shadow: 0 8px 32px 0 rgba(32,43,44,0.15); border-radius: 18px; padding: 2.5rem 2.5rem 2rem 2.5rem; min-width: 340px; max-width: 370px; width: 100%; display: flex; flex-direction: column; align-items: center;">
        <div style="font-size: 2.5rem; margin-bottom: 1rem; color: #202B2C;">
            <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' fill='none' viewBox='0 0 24 24'><rect width='24' height='24' rx='6' fill='#202B2C'/><path fill='#fff' d='M7 7.75A.75.75 0 0 1 7.75 7h8.5a.75.75 0 0 1 0 1.5h-8.5A.75.75 0 0 1 7 7.75Zm0 4A.75.75 0 0 1 7.75 11h8.5a.75.75 0 0 1 0 1.5h-8.5A.75.75 0 0 1 7 11.75Zm0 4A.75.75 0 0 1 7.75 15h5.5a.75.75 0 0 1 0 1.5h-5.5A.75.75 0 0 1 7 15.75Z'/></svg>
        </div>
        <h2 style="color: #202B2C; font-size: 1.6rem; font-weight: 700; margin-bottom: 1.5rem;">Login</h2>
        <form method="POST" action="{{ route('login') }}" style="width: 100%;">
            @csrf
            <div style="margin-bottom: 1.2rem;">
                <label for="email" style="display: block; color: #202B2C; font-weight: 500; margin-bottom: 0.4rem;">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus style="width: 100%; padding: 0.7rem; border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem;">
                @error('email')
                    <span style="color: #e11d48; font-size: 0.95rem;">{{ $message }}</span>
                @enderror
            </div>
            <div style="margin-bottom: 1.2rem;">
                <label for="password" style="display: block; color: #202B2C; font-weight: 500; margin-bottom: 0.4rem;">Password</label>
                <input id="password" type="password" name="password" required style="width: 100%; padding: 0.7rem; border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem;">
                @error('password')
                    <span style="color: #e11d48; font-size: 0.95rem;">{{ $message }}</span>
                @enderror
            </div>
            <div style="display: flex; align-items: center; margin-bottom: 1.2rem;">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="margin-right: 0.5rem;">
                <label for="remember" style="color: #202B2C; font-size: 0.98rem;">Remember Me</label>
            </div>
            <button type="submit" style="width: 100%; padding: 0.8rem 0; background: #202B2C; color: #fff; border: none; border-radius: 6px; font-weight: bold; font-size: 1.1rem; box-shadow: 0 2px 8px rgba(32,43,44,0.10); transition: background 0.2s, transform 0.2s; cursor: pointer;"
                onmouseover="this.style.background='#111818';this.style.transform='translateY(-2px) scale(1.03)';"
                onmouseout="this.style.background='#202B2C';this.style.transform='none';"
            >Login</button>
            <div style="margin-top: 0.8rem; text-align: center;">
                <a href="{{ route('register') }}" style="color: #202B2C; text-decoration: underline; font-size: 1rem; font-weight: 500;">Don't have an account? Register</a>
            </div>
            @if (Route::has('password.request'))
                <div style="margin-top: 1rem; text-align: right;">
                    <a href="{{ route('password.request') }}" style="color: #202B2C; text-decoration: underline; font-size: 0.98rem;">Forgot Your Password?</a>
                </div>
            @endif
        </form>
    </div>
</div>
                     