<div class="left-side border-bottom py-2">
    <h3 class="agileits-sear-head mb-3">Types</h3>
    <ul>
        @foreach ($types as $type)
            <li>
                <input type="checkbox" class="checked" name="type_{{ $type->id }}">
                <span class="span">{{ $type->name }}</span>
            </li>
        @endforeach
    </ul>
</div>