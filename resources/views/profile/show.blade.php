<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-between items-center">
            <h1>
                {{ __('Profile') }}
            </h1>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </x-slot>

    @section('content')
        <div class="container">
            @include('profile.orders')
        </div>
    @endsection
</x-app-layout>
