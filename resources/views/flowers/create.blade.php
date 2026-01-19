@extends('layout.main')
@section('content')
@include('components.nav')

<div style="max-width: 900px; margin: 30px auto;">
    <h2 style="margin-bottom: 30px; color: #2C3E50;">Add Flower Seed</h2>

    <form action="/flowers" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="background-color: #9CAF88; color: white; padding: 15px 20px; border-radius: 5px; margin-bottom: 25px; font-weight: bold; font-size: 18px;">
            Flower Seed Details
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
            <div>
                <label for="seed_name" class="form-label">Seed Name *</label>
                <input type="text" class="form-control @error('seed_name') is-invalid @enderror" id="seed_name" name="seed_name" placeholder="Enter seed name" value="{{ old('seed_name') }}">
                @error('seed_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="category" class="form-label">Category *</label>
                <select class="form-select @error('category') is-invalid @enderror" name="category" id="category">
                    <option value="">Select Category</option>
                    <option value="Rose" {{ old('category') === 'Rose' ? 'selected' : '' }}>Rose</option>
                    <option value="Sunflower" {{ old('category') === 'Sunflower' ? 'selected' : '' }}>Sunflower</option>
                    <option value="Tulip" {{ old('category') === 'Tulip' ? 'selected' : '' }}>Tulip</option>
                    <option value="Daisy" {{ old('category') === 'Daisy' ? 'selected' : '' }}>Daisy</option>
                    <option value="Lily" {{ old('category') === 'Lily' ? 'selected' : '' }}>Lily</option>
                    <option value="Lavender" {{ old('category') === 'Lavender' ? 'selected' : '' }}>Lavender</option>
                    <option value="Marigold" {{ old('category') === 'Marigold' ? 'selected' : '' }}>Marigold</option>
                    <option value="Peony" {{ old('category') === 'Peony' ? 'selected' : '' }}>Peony</option>
                </select>
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
            <div>
                <label for="price" class="form-label">Price (₱) *</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="0.00" value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="quantity" class="form-label">Quantity (in stock) *</label>
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="Number of seeds" value="{{ old('quantity') }}">
                @error('quantity')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
            <div>
                <label for="germination_time" class="form-label">Germination Time *</label>
                <input type="text" class="form-control @error('germination_time') is-invalid @enderror" id="germination_time" name="germination_time" placeholder="e.g., 7-14 days" value="{{ old('germination_time') }}">
                @error('germination_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="bloom_time" class="form-label">Bloom Time *</label>
                <input type="text" class="form-control @error('bloom_time') is-invalid @enderror" id="bloom_time" name="bloom_time" placeholder="e.g., 60-90 days" value="{{ old('bloom_time') }}">
                @error('bloom_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
            <div>
                <label for="color" class="form-label">Flower Color *</label>
                <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" placeholder="e.g., Red, Pink, Yellow" value="{{ old('color') }}">
                @error('color')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="height" class="form-label">Plant Height *</label>
                <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height" placeholder="e.g., 12-18 inches" value="{{ old('height') }}">
                @error('height')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div style="margin-bottom: 25px;">
            <label for="image" class="form-label">Flower Image</label>
            <div style="border: 2px dashed #dee2e6; border-radius: 5px; padding: 30px; text-align: center; background-color: #f8f9fa;">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" style="display: none;" onchange="previewImage(event)">
                <div id="imagePreview" style="display: none; margin-bottom: 20px;">
                    <img id="previewImg" src="" alt="Preview" style="max-width: 200px; max-height: 200px; border-radius: 5px;">
                </div>
                <button type="button" onclick="document.getElementById('image').click()" class="btn btn-secondary" style="margin-right: 10px;">Browse</button>
                <label style="color: #6c757d; font-size: 14px;">Supported formats: JPG, PNG, JPEG (Max: 2MB)</label>
            </div>
            @error('image')
                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 25px;">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Enter flower seed description..." style="resize: vertical;">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 25px;">
            <label for="status" class="form-label">Status *</label>
            <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                <option value="">Select Status</option>
                <option value="Available" {{ old('status') === 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Unavailable" {{ old('status') === 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: flex; gap: 10px; justify-content: center; margin-top: 30px;">
            <button type="submit" class="btn" style="background-color: #9CAF88; color: white; padding: 10px 30px; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
            <a href="/flowers" class="btn" style="background-color: #2C3E50; color: white; padding: 10px 30px; text-decoration: none; border-radius: 5px;">Cancel</a>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        previewImg.src = reader.result;
        preview.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection
