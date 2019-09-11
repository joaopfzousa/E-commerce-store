    <div class="left-side border-bottom py-2">
        <h3 class="agileits-sear-head mb-3">Brands</h3>
        <ul>
            @foreach ($brands as $brand)
                <li>
                    <input type="checkbox" class="checked" name="brand_{{ $brand->id }}">
                    <span class="span">{{ $brand->name }}</span>
                </li>
            @endforeach
        </ul>
    </div>