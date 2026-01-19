@extends('layout.main')
@section('content')
@include('components.nav')

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table thead {
        background-color: #9CAF88 !important;
        color: white !important;
    }
    table tbody tr {
        vertical-align: middle;
    }
</style>

<div class="container-fluid p-4">
    @if (session('success'))
        <div class="alert alert-success fade show" role="alert" id="successAlert" style="font-size: 14px; padding: 12px 20px; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; border-radius: 5px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); background-color: #9CAF88; border: none; color: white;">
            {{ session('success') }}
        </div>
        </div>
        <script>
            setTimeout(function() {
                const alert = document.getElementById('successAlert');
                if (alert) {
                    alert.classList.remove('show');
                    setTimeout(() => alert.remove(), 150);
                }
            }, 3000);
        </script>
    @endif

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: #2C3E50;">
            @if($search)
                Search Results for "{{ $search }}"
            @else
                Flower Seeds
            @endif
        </h2>
        <a href="/flowers/create" class="btn" style="background-color: #9CAF88; color: white; border: none; padding: 8px 16px; border-radius: 5px; text-decoration: none;">Add New</a>
    </div>

    <!-- Search Bar -->
    <div style="margin-bottom: 20px;">
        <form method="GET" action="/flowers" style="display: flex; gap: 10px;">
            <input type="text" class="form-control" placeholder="Search by seed name or category..." name="search" value="{{ $search ?? '' }}" style="max-width: 400px;">
            <button type="submit" class="btn" style="background-color: #9CAF88; color: white; border: none; padding: 8px 16px; border-radius: 5px;">Search</button>
            @if($search)
                <a href="/flowers" class="btn" style="background-color: #2C3E50; color: white; border: none; padding: 8px 16px; border-radius: 5px; text-decoration: none;">Clear</a>
            @endif
        </form>
    </div>

    <!-- Records per page -->
    <div style="margin-bottom: 15px;">
        <label for="perPage">Show <select id="perPage" name="perPage" class="form-select" style="width: auto; display: inline-block;" onchange="window.location.href='/flowers?per_page=' + this.value">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
        </select> entries</label>
    </div>

    <!-- Flower Seeds Table -->
    <div style="overflow-x: auto;">
        <table class="table table-striped table-hover" style="background-color: #F5F1E8;">
            <thead style="background-color: #9CAF88; color: white;">
                <tr>
                    <th style="width: 5%; text-align: center;">S NO.</th>
                    <th style="width: 15%;">Flower Image</th>
                    <th style="width: 20%;">Seed Name</th>
                    <th style="width: 15%;">Category</th>
                    <th style="width: 10%; text-align: right;">Price</th>
                    <th style="width: 10%; text-align: center;">Status</th>
                    <th style="width: 25%; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($flowers as $flower)
                    <tr style="vertical-align: middle;">
                        <td style="text-align: center;">{{ $loop->iteration + ($flowers->currentPage() - 1) * $flowers->perPage() }}</td>
                        <td>
                            @if($flower->image)
                                <img src="{{ asset('storage/' . $flower->image) }}" alt="{{ $flower->seed_name }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
                            @else
                                <div style="width: 80px; height: 80px; background-color: #e9ecef; display: flex; align-items: center; justify-content: center; border-radius: 5px; color: #6c757d;">
                                    No Image
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $flower->seed_name }}</strong><br>
                            <small style="color: #6c757d;">{{ Str::limit($flower->description, 50) }}</small>
                        </td>
                        <td>{{ $flower->category }}</td>
                        <td style="text-align: right;"><strong>₱{{ number_format($flower->price, 2) }}</strong></td>
                        <td style="text-align: center;">
                            @if($flower->status === 'Available')
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-danger">Unavailable</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <div style="display: flex; gap: 5px; justify-content: center;">
                                <a href="/flowers/{{ $flower->id }}" class="btn btn-sm" style="background-color: #9CAF88; color: white; border: none; padding: 6px 12px; text-decoration: none; border-radius: 3px;">View</a>
                                <a href="/flowers/edit/{{ $flower->id }}" class="btn btn-sm" style="background-color: #F4D03F; color: #2C3E50; border: none; padding: 6px 12px; text-decoration: none; border-radius: 3px; font-weight: bold;">Edit</a>
                                <a href="/flowers/delete/{{ $flower->id }}" class="btn btn-sm" style="background-color: #E07856; color: white; border: none; padding: 6px 12px; text-decoration: none; border-radius: 3px;">Delete</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px;">
                            <p style="color: #6c757d;">No flower seeds found. <a href="/flowers/create">Add one now!</a></p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div style="display: flex; justify-content: flex-end; align-items: center; margin-top: 30px;">
        <nav>
            <ul class="pagination" style="margin: 0;">
                @if ($flowers->onFirstPage())
                    <li class="page-item disabled"><span class="page-link" style="color: #ccc; background-color: #f0f0f0; padding: 8px 16px;">Previous</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $flowers->previousPageUrl() }}" style="color: white; background-color: #9CAF88; border-color: #9CAF88; padding: 8px 16px;">Previous</a></li>
                @endif

                @foreach ($flowers->getUrlRange(1, $flowers->lastPage()) as $page => $url)
                    @if ($page == $flowers->currentPage())
                        <li class="page-item active"><span class="page-link" style="background-color: #9CAF88; border-color: #9CAF88; color: white;">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}" style="color: #9CAF88; border-color: #ddd;">{{ $page }}</a></li>
                    @endif
                @endforeach

                @if ($flowers->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $flowers->nextPageUrl() }}" style="color: white; background-color: #9CAF88; border-color: #9CAF88; padding: 8px 16px;">Next</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link" style="color: #ccc; background-color: #f0f0f0; padding: 8px 16px;">Next</span></li>
                @endif
            </ul>
        </nav>
    </div>
</div>

@endsection
