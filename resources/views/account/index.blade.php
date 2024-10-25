@extends('dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-4">My Account</h2>

    <div class="mb-4">
        <strong>Name:</strong> {{ $user->name }}
    </div>

    <div class="mb-4">
        <strong>Email:</strong> {{ $user->email }}
    </div>

    <div class="mb-4">
        <strong>Joined on:</strong> {{ $user->created_at->format('d M Y') }}
    </div>
@endsection
