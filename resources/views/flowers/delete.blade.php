@extends('layout.main')
@section('content')
@include('components.nav')

<div style="max-width: 600px; margin: 50px auto;">
    <div style="background-color: #FFF3E0; border: 2px solid #E07856; border-radius: 5px; padding: 25px; text-align: center;">
        <h3 style="color: #2C3E50; margin-bottom: 20px;">Delete Confirmation</h3>
        
        <p style="color: #2C3E50; margin-bottom: 25px; font-size: 16px;">
            Are you sure you want to delete <strong>{{ $flower->seed_name }}</strong>?
        </p>

        <p style="color: #6c757d; margin-bottom: 30px; font-size: 14px;">
            This action cannot be undone.
        </p>

        @if($flower->image)
            <div style="margin-bottom: 25px;">
                <img src="{{ asset('storage/' . $flower->image) }}" alt="{{ $flower->seed_name }}" style="max-width: 200px; max-height: 200px; border-radius: 5px;">
            </div>
        @endif

        <form action="/flowers/destroy/{{ $flower->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <div style="display: flex; gap: 10px; justify-content: center;">
                <button type="submit" class="btn" style="background-color: #E07856; color: white; padding: 10px 30px; border: none; border-radius: 5px; cursor: pointer;">Delete</button>
                <a href="/flowers" class="btn" style="background-color: #2C3E50; color: white; padding: 10px 30px; text-decoration: none; border-radius: 5px;">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
