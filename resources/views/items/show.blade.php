@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8">
        <h1 class="text-2xl font-bold mb-4">Item Details</h1>
        <div class="mb-4">
            <strong class="block text-gray-700 text-sm font-bold">Name:</strong>
            <p class="text-gray-900">{{ $item->name }}</p>
        </div>
        <div class="mb-4">
            <strong class="block text-gray-700 text-sm font-bold">Description:</strong>
            <p class="text-gray-900">{{ $item->description }}</p>
        </div>
        <div class="mb-4">
            <strong class="block text-gray-700 text-sm font-bold">Price:</strong>
            <p class="text-gray-900">{{ $item->price }}</p>
        </div>
        <div class="mb-4">
            <strong class="block text-gray-700 text-sm font-bold">Quantity:</strong>
            <p class="text-gray-900">{{ $item->quantity }}</p>
        </div>
        <a href="{{ route('items.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
            Back
        </a>
    </div>
</div>

@endsection
