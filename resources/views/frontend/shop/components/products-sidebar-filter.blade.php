<form action="{{request() -> segment(2) == 'product' ? 'shop': '' }}">
    <div class="filter-widget">
        <h4 class="fw-title st widget-title">Danh mục</h4>
        <ul class="filter-catagories">
            @foreach ($categories as $category)
                <li><a href="shop/category/{{ $category->name }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>

    </div>

    <div class="filter-widget">
        <div class="fw-title st widget-title">Thương hiệu</div>
        <div class="fw-brand-check">
            @foreach ($brands as $brand)
                <div class="bc-item">
                    <label for="bc-{{ $brand->id }}">
                        {{ $brand->name }}
                        <input type="checkbox"
                            {{ (request('brand')[$brand->id] ?? '') == 'on' ? 'checked' : '' }}
                            id="bc-{{ $brand->id }}" name="brand[{{ $brand->id }}]"
                            onchange="this.form.submit()" />
                        <span class="checkmark"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="filter-widget">
        <div class="fw-title st widget-title">Giá</div>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount" name="price_min" />
                    <input type="text" id="maxamount" name="price_max" />
                </div>
            </div>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget-content"
                data-min="100000" data-max="1000000"
                data-min-value="{{ str_replace('đ', '', request('price_min')) }}"
                data-max-value="{{ str_replace('đ', '', request('price_max')) }}">
                <div class="ui-slider--range ui-corner-all ui-widget-header "></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
            </div>
        </div>
        <button type="submit" class="filter-btn">Lọc</button>
    </div>         --}}
</form>