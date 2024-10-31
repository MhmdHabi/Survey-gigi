@extends('layouts.dashboard')

@section('content')
    <div class="flex bg-[#5DB9FF] px-8 rounded-lg border border-gray-300">
        <div class="flex-1 flex flex-col justify-between py-6 mr-4 text-white">
            <p>{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
            <div>
                <h2 class="text-2xl font-bold">Good Day, Habi!</h2>
                <p class="mt-2">Have a Nice Day!</p>
            </div>
        </div>
        <div class="flex-none">
            <img src="{{ asset('assets/admin-image.png') }}" alt="Admin Image" class="h-48 w-48 object-cover">
        </div>
    </div>
@endsection
