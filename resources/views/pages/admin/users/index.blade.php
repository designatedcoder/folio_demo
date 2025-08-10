<?php
    use function Laravel\Folio\Name;

    name('admin.users.index');
?>

@php
    use App\Models\User;
    use App\Enums\AdminStatus;

    $users = User::where('is_admin', AdminStatus::USER)->get();
@endphp

@extends('layouts.app')

@section('content')
    <div class="flex flex-col space-y-6 p-4 sm:ml-64">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl">User's Table</h2>
            <a href="{{ route('admin.users.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</a>
        </div>

        <div class="mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            E-mail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Joined
                        </th>
                        <th scope="col" class="text-right px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->created_at->format('m/d/Y') }}
                        </td>
                        <td class="flex justify-end space-x-2 px-6 py-4">
                            <a href="{{ route('admin.users.show', ['User' => $user]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form
                                action="{{ route('admin.users.destroy', $user->id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                            </form>
                    </tr>
                    @empty
                        There's nothing to see here.
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection

