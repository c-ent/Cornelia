<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; font-family: 'Segoe UI', Arial, sans-serif; background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);">
    <div style="background: #fff; box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15); border-radius: 18px; padding: 2.5rem 3rem; display: flex; flex-direction: column; align-items: center; min-width: 340px;">
        <div style="font-size: 3rem; margin-bottom: 1rem; color: #202B2C;">
            <svg xmlns='http://www.w3.org/2000/svg' width='48' height='48' fill='none' viewBox='0 0 24 24'><rect width='24' height='24' rx='6' fill='#202B2C'/><path fill='#fff' d='M7 7.75A.75.75 0 0 1 7.75 7h8.5a.75.75 0 0 1 0 1.5h-8.5A.75.75 0 0 1 7 7.75Zm0 4A.75.75 0 0 1 7.75 11h8.5a.75.75 0 0 1 0 1.5h-8.5A.75.75 0 0 1 7 11.75Zm0 4A.75.75 0 0 1 7.75 15h5.5a.75.75 0 0 1 0 1.5h-5.5A.75.75 0 0 1 7 15.75Z'/></svg>
        </div>
        <h1 style="margin-bottom: 1.5rem; color: #222; font-size: 2rem; font-weight: 700; letter-spacing: 1px; text-align: center;">Welcome to the Library<br>Management System</h1>
        @auth
            <a href="/{{ $role }}" style="margin-top: 1rem; padding: 0.75rem 2.5rem; background: #202B2C; color: #fff; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 1.1rem; box-shadow: 0 2px 8px rgba(32,43,44,0.10); transition: background 0.2s, transform 0.2s; display: inline-block; text-align: center;"
                onmouseover="this.style.background='#111818';this.style.transform='translateY(-2px) scale(1.03)';"
                onmouseout="this.style.background='#202B2C';this.style.transform='none';"
            >Go to Dashboard</a>
        @endauth
        @guest
            <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" style="padding: 0.75rem 2.5rem; background: #202B2C; color: #fff; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 1.1rem; box-shadow: 0 2px 8px rgba(32,43,44,0.10); transition: background 0.2s, transform 0.2s; display: inline-block; text-align: center;"
                        onmouseover="this.style.background='#111818';this.style.transform='translateY(-2px) scale(1.03)';"
                        onmouseout="this.style.background='#202B2C';this.style.transform='none';"
                    >Login</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="padding: 0.75rem 2.5rem; background: #64748b; color: #fff; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 1.1rem; box-shadow: 0 2px 8px rgba(100,116,139,0.08); transition: background 0.2s, transform 0.2s; display: inline-block; text-align: center;"
                        onmouseover="this.style.background='#334155';this.style.transform='translateY(-2px) scale(1.03)';"
                        onmouseout="this.style.background='#64748b';this.style.transform='none';"
                    >Register</a>
                @endif
            </div>
        @endguest
    </div>
</div>