@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8">
            <h1 class="text-2xl font-bold mb-4">Item Details</h1>
            @if ($lowStockItemAlert)
                <div class="mt-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
                    <p class="font-bold">Low Stock Alert</p>
                    <p>This item have low stock:</p>
                    <ul class="list-disc list-inside">

                        <li>{{ $lowStockItemAlert->name }} ({{ $lowStockItemAlert->quantity }} left)</li>

                    </ul>
                </div>
            @endif
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
            <a href="{{ route('items.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                Back
            </a>
        </div>
    </div>
@endsection
