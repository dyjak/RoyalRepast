<section class="sorting-filtering-section justify-around mb-6">
    <form action="{{ route('restaurants.index') }}" method="get" class="row g-3 justify-content-center align-items-center">
        <div class="col-md-12 filtering-elem card">
            <div class="row row-cols-auto justify-content-center">
                <div class="col-auto m-1">
                    <div class="form-check-radio">
                        <input class="form-check-input" type="radio" name="category" value="all"
                               id="category_all" {{ request('category', 'all') == 'all' ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_all">
                            <i class="fas fa-globe"></i> All
                        </label>
                    </div>
                </div>
                <div class="col-auto m-1">
                    <div class="form-check-radio">
                        <input class="form-check-input" type="radio" name="category" value="fast_food"
                               id="category_fast_food" {{ request('category') == 'fast_food' ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_fast_food">
                            <i class="fas fa-hamburger"></i> Fast Food
                        </label>
                    </div>
                </div>
                <div class="col-auto m-1">
                    <div class="form-check-radio">
                        <input class="form-check-input" type="radio" name="category" value="fine_dining"
                               id="category_fine_dining" {{ request('category') == 'fine_dining' ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_fine_dining">
                            <i class="fas fa-utensils"></i> Fine Dining
                        </label>
                    </div>
                </div>
                <div class="col-auto m-1">
                    <div class="form-check-radio">
                        <input class="form-check-input" type="radio" name="category" value="casual_dining"
                               id="category_casual_dining" {{ request('category') == 'casual_dining' ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_casual_dining">
                            <i class="fas fa-utensil-spoon"></i> Casual Dining
                        </label>
                    </div>
                </div>
                <div class="col-auto m-1">
                    <div class="form-check-radio">
                        <input class="form-check-input" type="radio" name="category" value="cafe"
                               id="category_cafe" {{ request('category') == 'cafe' ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_cafe">
                            <i class="fas fa-coffee"></i> Cafe
                        </label>
                    </div>
                </div>
                <div class="col-auto m-1">
                    <div class="form-check-radio">
                        <input class="form-check-input" type="radio" name="category" value="kebab"
                               id="category_kebab" {{ request('category') == 'kebab' ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_kebab">
                            <i class="fas fa-drumstick-bite"></i> Kebab
                        </label>
                    </div>
                </div>
                <div class="col-auto m-1">
                    <div class="form-check-radio">
                        <input class="form-check-input" type="radio" name="category" value="pizza"
                               id="category_pizza" {{ request('category') == 'pizza' ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_pizza">
                            <i class="fas fa-pizza-slice"></i> Pizza
                        </label>
                    </div>
                </div>
                <div class="col-auto m-1">
                    <div class="form-check-radio">
                        <input class="form-check-input" type="radio" name="category" value="food_truck"
                               id="category_food_truck" {{ request('category') == 'food_truck' ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_food_truck">
                            <i class="fas fa-truck"></i> Food Truck
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card filtering-elem">
            <div class="col-md-3 filtering-elem1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="free_delivery"
                           id="free-delivery" {{ request('free_delivery') ? 'checked' : '' }}>
                    <label class="form-check-label" for="free-delivery"><i class="fas fa-shipping-fast">FREE</i></label>
                </div>
            </div>

            <div class="col-md-3 filtering-elem1">
                <div class="input-group">
                    <input type="text" id="search" name="search" class="form-control"
                           placeholder="Search..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3 filtering-elem1">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
</section>
