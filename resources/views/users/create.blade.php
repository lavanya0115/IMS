@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class=" mt-5 max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-4">Create User</h1>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
                    <input type="text" id="first_name" name="first_name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('first_name')
                        <span class="text-red-700 font-bold">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
                    <input type="text" id="last_name" name="last_name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('last_name')
                        <span class="text-red-700 font-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="user_name" class="block text-gray-700 text-sm font-bold mb-2">User Name:</label>
                    <input type="text" id="user_name" name="user_name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('user_name')
                        <span class="text-red-700 font-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="mobile_number" class="block text-gray-700 text-sm font-bold mb-2">Mobile Number:</label>
                    <input id="mobile_number" name="mobile_number" type="tel" maxlength="10" pattern="[0-9]{10}"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('mobile_number')
                        <span class="text-red-700 font-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="text" id="email" name="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('email')
                        <span class="text-red-700 font-bold">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
                <a href="{{ route('items.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                    Back
                </a>
            </form>
        </div>
    </div>
@endsection
