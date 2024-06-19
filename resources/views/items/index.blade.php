@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 mt-5">
        <h1 class="text-2xl font-bold mb-4">Inventory Items</h1>
        <div class="mt-2 mb-3">
            {{-- @if (auth()->user()->hasRole('admin')) --}}
            <a href="{{ route('items.create') }}"
                class="float- end bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded-full inline-flex items-center">
                @include('icons.add')
                <span class="ps-2"> Create New Item</span>
            </a>
            {{-- @endif --}}

            <a href="{{ route('items.export') }}"
                class="me-2 float-end bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded-full inline-flex items-center">
                @include('icons.uparrow')
                <span class="ps-2">Export to Excel</span>
            </a>

            {{-- <div> --}}
            {{-- <a href="#"
                    class="me-3 float-end bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded-full inline-flex items-center">
                    @include('icons.file')
                    <span class="ps-2">CSV</span>
                </a> --}}
            {{-- </div> --}}
        </div>
        @if ($message = Session::get('success'))
            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2 mt-2">
                {{ $message }}
            </div>
        @endif
        <div class="overflow-x-auto">
            @if ($lowStockItems->isNotEmpty())
                <div class="mt-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
                    <p class="font-bold">Low Stock Alert</p>
                    <p>The following items have low stock:</p>
                    <ul class="list-disc list-inside">
                        @foreach ($lowStockItems as $item)
                            <li>{{ $item->name }} ({{ $item->quantity }} left)</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <table class="min-w-full bg-white shadow-md rounded my-6 text-center">
                <thead>
                    <tr>
                        <th
                            class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">
                            Name</th>
                        <th
                            class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">
                            Description</th>
                        <th
                            class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">
                            Price</th>
                        <th
                            class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">
                            Quantity</th>
                        {{-- @if (auth()->user()->hasRole('admin')) --}}
                        <th
                            class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">
                            Actions</th>
                        {{-- @endif --}}
                    </tr>
                </thead>
                <tbody id="items-table-body">
                    @forelse ($items as $item)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b border-gray-300">{{ $item->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $item->description }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $item->price }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $item->quantity }}</td>
                            {{-- @if (auth()->user()->hasRole('admin')) --}}
                            <td class="py-2 px-4 border-b border-gray-300">

                                <a href="{{ route('items.edit', $item->id) }}"
                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded inline-flex items-center">
                                    @include('icons.edit')
                                </a>
                                <a href="{{ route('items.show', $item->id) }}"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded inline-flex items-center">
                                    @include('icons.show')
                                </a>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">@include('icons.delete')</button>
                                </form>
                            </td>
                            {{-- @endif --}}
                        </tr>
                    @empty
                        <tr class="bg-gray-100">
                            <td colspan="5" class="py-2 text-red-500 text-center text-lg px-4 border-b border-gray-300">
                                No Items Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
