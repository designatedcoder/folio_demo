@extends('layouts.auth')

@section('title', 'Login')

@section('header', 'Login to your account')

@section('form')
    <form
        class="space-y-4 md:space-y-6"
        action="{{ route('login') }}"
        method="POST"
    >
        @csrf
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com">
            @error('email')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('email')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login to your account</button>
    </form>
@endsection

@section('footer')
    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        Need an account?
        <a href="{{ route('register') }}"
            class="font-medium text-blue-600 hover:underline dark:text-primary-500">Register  here</a>
    </p>
@endsection
