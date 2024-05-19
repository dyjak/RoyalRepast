<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Address') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your address information.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.updateAddress') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="street" :value="__('Street')" />
            <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" value="{{ $user->street }}" />
            <x-input-error :messages="$errors->updateAddress->get('street')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" value="{{ $user->city }}" />
            <x-input-error :messages="$errors->updateAddress->get('city')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="postal_code" :value="__('Postal Code')" />
            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" value="{{ $user->postal_code }}" />
            <x-input-error :messages="$errors->updateAddress->get('postal_code')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" value="{{ $user->address }}" />
            <x-input-error :messages="$errors->updateAddress->get('address')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('success'))
{{--                <p--}}
{{--                    x-data="{ show: true }"--}}
{{--                    x-show="show"--}}
{{--                    x-transition--}}
{{--                    x-init="setTimeout(() => show = false, 2000)"--}}
{{--                    class="text-sm text-gray-600"--}}
{{--                >{{ __('Address updated.') }}</p>--}}
            @endif
        </div>
    </form>
</section>
