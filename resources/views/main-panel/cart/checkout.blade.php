@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-center">
        <div style="width: 50%;">
            <h1 class="text-center">Checkout</h1>
            @if($cart)
                <form action="{{ route('cart.placeOrder') }}" method="POST">
                    @csrf
                    <div class="form-group">

                        <div>
                            <x-input-label for="street" :value="__('Street')" />
                            <x-text-input id="street" name="street" type="text" class="mt-1 block w-full"
                                          value="{{ $user->street }}" />
                            <x-input-error :messages="$errors->updateAddress->get('street')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="city" :value="__('City')" />
                            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full"
                                          value="{{ $user->city }}" />
                            <x-input-error :messages="$errors->updateAddress->get('city')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="postal_code" :value="__('Postal Code')" />
                            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full"
                                          value="{{ $user->postal_code }}" pattern="\d{2}-\d{3}"
                                          title="Postal code must be in the format XX-XXX (e.g., 12-345)" />
                            <x-input-error :messages="$errors->updateAddress->get('postal_code')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                                          value="{{ $user->address }}" />
                            <x-input-error :messages="$errors->updateAddress->get('address')" class="mt-2" />
                        </div>

                        <hr>
                        <h3 class="text-center">Total Cost: ${{ number_format($totalCost, 2) }}</h3>
                        <label for="payment_method" class="mt-3">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-control">
                            <option value="Card">Credit Card</option>
                            <option value="PayPal">PayPal</option>
                            <option value="GooglePay">GooglePay</option>
                            <option value="ApplePay">ApplePay</option>
                            <option value="Crypto">Crypto</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Place Order</button>
                </form>
            @else
                <p>Your cart is empty.</p>
            @endif
        </div>
    </div>
@endsection
