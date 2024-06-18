@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 mt-5">
        <h1 class="text-2xl font-bold mb-4">Users List</h1>

        <a href="{{ route('users.create') }}"
            class="float- end bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded-full inline-flex items-center">
            @include('icons.add')
            <span class="ps-2"> Create User</span>
        </a>

        @if ($message = Session::get('success'))
            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2 mt-2">
                {{ $message }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded my-6 text-center">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">
                            Name</th>

                        <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">
                            User Name</th>
                        <th
                            class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">
                            Mobile Number</th>
                        <th
                            class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">
                            Email</th>
                        <th
                            class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">
                            Address</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b border-gray-300">{{ $user->first_name ?? '--' }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $user->user_name ?? '--' }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $user->mobile_number ?? '--' }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $user->email ?? '--'}}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $user->address ?? '--' }}</td>
                        </tr>
                    @empty
                        <tr class="bg-gray-100">
                            <td colspan="5" class="py-2 text-red-500 text-center text-lg px-4 border-b border-gray-300">
                                No users Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
