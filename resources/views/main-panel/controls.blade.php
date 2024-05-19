<section class="sorting-filtering-section card justify-around mb-6">
    <form action="{{ route('restaurants.index') }}" method="get" class="row g-3 justify-between items-center">
        <div class="col-md-4">
            <select name="sort_by" id="sort-by" class="form-select">
                <option value="ratings" {{ request('sort_by') == 'ratings' ? 'selected' : '' }}>Sort by ratings</option>
                <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Sort by name</option>
            </select>
        </div>

        <div class="col-md-6">
            <div class="row row-cols-1 row-cols-md-4 g-3">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" value="all" id="category_all" {{ request('category', 'all') == 'all' ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_all">All</label>
                    </div>
                </div>
                @foreach($categories as $category)
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="{{ $category->name }}" id="category_{{ $category->id }}" {{ request('category') == $category->name ? 'checked' : '' }}>
                            <label class="form-check-label" for="category_{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="free_delivery" id="free-delivery" {{ request('free_delivery') ? 'checked' : '' }}>
                <label class="form-check-label" for="free-delivery">Free delivery</label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="input-group">
                <input type="text" id="search" name="search" class="form-control" placeholder="Search for restaurant..." value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</section>
