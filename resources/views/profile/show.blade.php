<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>

        @include('profile.orders')

    </x-slot>
</x-app-layout>
