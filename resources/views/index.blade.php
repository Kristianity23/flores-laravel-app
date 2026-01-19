@extends('layout.main')
@section('content')
@include('components.nav')
    <div style="text-align: center; padding: 60px 20px; background: linear-gradient(rgba(154, 175, 136, 0.8), rgba(245, 241, 232, 0.8)), url('https://images.unsplash.com/photo-1518895949257-7621c3c786d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover; background-attachment: fixed; background-size: cover; min-height: 400px; display: flex; flex-direction: column; justify-content: center; align-items: center; position: relative;">
        <style>
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .hero-content {
                animation: fadeIn 0.8s ease-in-out;
            }
        </style>
        <div class="hero-content">
            <h1 style="font-size: 48px; margin-bottom: 20px; color: #2C3E50; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">Welcome to Flower Seeds Shop</h1>
            <p style="font-size: 18px; color: #2C3E50; margin-bottom: 30px; font-weight: 500; text-shadow: 1px 1px 2px rgba(0,0,0,0.05);">Discover beautiful and premium quality flower seeds for your garden</p>
            @if(Auth::check())
                <a href="/flowers" class="btn" style="background-color: #E07856; color: white; padding: 12px 30px; font-size: 16px; text-decoration: none; border-radius: 5px; display: inline-block; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">Manage Inventory</a>
            @else
                <a href="/login" class="btn" style="background-color: #E07856; color: white; padding: 12px 30px; font-size: 16px; text-decoration: none; border-radius: 5px; display: inline-block; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-right: 10px;">Sign In</a>
                <a href="/register" class="btn" style="background-color: #9CAF88; color: white; padding: 12px 30px; font-size: 16px; text-decoration: none; border-radius: 5px; display: inline-block; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">Create Account</a>
            @endif
        </div>
    </div>
@endsection
