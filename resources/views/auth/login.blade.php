@extends('layout.main')
@section('content')

<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #9CAF88 0%, #E07856 100%);">
    <div style="background-color: white; padding: 40px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); width: 100%; max-width: 400px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="width: 80px; height: 80px; background-color: #9CAF88; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 36px; margin: 0 auto 15px;">🌸</div>
            <h2 style="color: #2C3E50; margin: 0;">Flower Seeds Admin</h2>
            <p style="color: #9CAF88; margin: 5px 0 0 0;">Sign in to your account</p>
        </div>

        @if ($errors->any())
            <div style="background-color: #ffebee; border-left: 4px solid #E07856; padding: 12px 15px; margin-bottom: 20px; border-radius: 3px; color: #c62828; font-size: 14px;">
                @foreach ($errors->all() as $error)
                    <p style="margin: 5px 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/login" style="margin-bottom: 20px;">
            @csrf
            
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; color: #2C3E50; font-weight: 600; margin-bottom: 5px;">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required style="width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;" placeholder="admin@example.com">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; color: #2C3E50; font-weight: 600; margin-bottom: 5px;">Password</label>
                <input type="password" name="password" id="password" required style="width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;" placeholder="Enter your password">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: flex; align-items: center; color: #2C3E50; font-size: 14px;">
                    <input type="checkbox" name="remember" style="margin-right: 8px;">
                    Remember me
                </label>
            </div>

            <button type="submit" style="width: 100%; background-color: #9CAF88; color: white; border: none; padding: 12px; border-radius: 5px; font-weight: 600; cursor: pointer; font-size: 15px; transition: all 0.3s ease;">Sign In</button>
        </form>

        <div style="text-align: center; padding-top: 20px; border-top: 1px solid #eee;">
            <p style="color: #6c757d; margin: 0; font-size: 14px;">Don't have an account? <a href="/register" style="color: #9CAF88; text-decoration: none; font-weight: 600;">Create one</a></p>
        </div>
    </div>
</div>

@endsection
