@extends('layout.main')
@section('content')
@include('components.nav')

<div style="max-width: 900px; margin: 30px auto;">
    <div style="background-color: #F5F1E8; padding: 20px; border-radius: 5px; margin-bottom: 30px;">
        <h2 style="color: #2C3E50;">{{ $flower->seed_name }}</h2>
        <p style="color: #9CAF88; margin-top: 5px;">Flower Seed Details</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
        <!-- Left side - Image -->
        <div>
            <div style="border: 1px solid #dee2e6; border-radius: 5px; padding: 20px; text-align: center;">
                @if($flower->image)
                    <img src="{{ asset('storage/' . $flower->image) }}" alt="{{ $flower->seed_name }}" style="width: 100%; max-width: 400px; border-radius: 5px;">
                @else
                    <div style="width: 100%; height: 400px; background-color: #e9ecef; display: flex; align-items: center; justify-content: center; border-radius: 5px; color: #6c757d;">
                        <div>
                            <p>No Image Available</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Right side - Details -->
        <div>
            <div style="background-color: #F5F1E8; border: 1px solid #D4CCC3; border-radius: 5px; padding: 25px;">
                <div style="margin-bottom: 20px; padding-bottom: 15px; border-bottom: 2px solid #9CAF88;">
                    <p style="color: #6c757d; margin: 0; font-size: 12px; text-transform: uppercase;">Price</p>
                    <h3 style="margin: 8px 0 0 0; color: #E07856; font-size: 28px;">₱{{ number_format($flower->price, 2) }}</h3>
                </div>

                <div style="margin-bottom: 20px;">
                    <p style="color: #6c757d; margin: 0; font-size: 12px; text-transform: uppercase;">Status</p>
                    <p style="margin: 8px 0;">
                        @if($flower->status === 'Available')
                            <span class="badge" style="background-color: #9CAF88; font-size: 14px; padding: 8px 12px;">Available</span>
                        @else
                            <span class="badge" style="background-color: #E07856; font-size: 14px; padding: 8px 12px;">Unavailable</span>
                        @endif
                    </p>
                </div>

                <div style="background-color: #FFFBF5; padding: 15px; border-radius: 5px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                        <div>
                            <p style="color: #6c757d; margin: 0; font-size: 12px; text-transform: uppercase;">Category</p>
                            <p style="margin: 8px 0; font-weight: 500;">{{ $flower->category }}</p>
                        </div>
                        <div>
                            <p style="color: #6c757d; margin: 0; font-size: 12px; text-transform: uppercase;">Color</p>
                            <p style="margin: 8px 0; font-weight: 500;">{{ $flower->color }}</p>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                        <div>
                            <p style="color: #6c757d; margin: 0; font-size: 12px; text-transform: uppercase;">Height</p>
                            <p style="margin: 8px 0; font-weight: 500;">{{ $flower->height }}</p>
                        </div>
                        <div>
                            <p style="color: #6c757d; margin: 0; font-size: 12px; text-transform: uppercase;">Quantity</p>
                            <p style="margin: 8px 0; font-weight: 500;">{{ $flower->quantity }} in stock</p>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div>
                            <p style="color: #6c757d; margin: 0; font-size: 12px; text-transform: uppercase;">Germination Time</p>
                            <p style="margin: 8px 0; font-weight: 500;">{{ $flower->germination_time }}</p>
                        </div>
                        <div>
                            <p style="color: #6c757d; margin: 0; font-size: 12px; text-transform: uppercase;">Bloom Time</p>
                            <p style="margin: 8px 0; font-weight: 500;">{{ $flower->bloom_time }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Description -->
    @if($flower->description)
        <div style="background-color: #F5F1E8; border: 1px solid #D4CCC3; border-radius: 5px; padding: 25px; margin-bottom: 30px;">
            <h5 style="margin-bottom: 15px; color: #2C3E50;">Description</h5>
            <p style="color: #495057; line-height: 1.6;">{{ $flower->description }}</p>
        </div>
    @endif

    <!-- Action Buttons -->
    <div style="display: flex; gap: 10px; justify-content: center;">
        <a href="/flowers/edit/{{ $flower->id }}" class="btn" style="background-color: #F4D03F; color: #2C3E50; padding: 8px 16px; text-decoration: none; border-radius: 5px; font-weight: bold;">Edit</a>
        <a href="/flowers/delete/{{ $flower->id }}" class="btn" style="background-color: #E07856; color: white; padding: 8px 16px; text-decoration: none; border-radius: 5px;">Delete</a>
        <a href="/flowers" class="btn" style="background-color: #2C3E50; color: white; padding: 8px 16px; text-decoration: none; border-radius: 5px;">Back to List</a>
    </div>
</div>

@endsection
