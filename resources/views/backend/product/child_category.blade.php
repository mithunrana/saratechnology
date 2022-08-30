<li style="padding: 2px;border: none;" class="list-group-item">
    <label style="margin-bottom: 0px;font-weight: 500;">
        <input type="checkbox" value="{{$sub_items->id}}"  name="categories[]">&nbsp {{$sub_items->name}} 
    </label>
</li>
@if ($sub_items->subCategory)
    <ul>
        @if(count($sub_items->subCategory) > 0)
            @foreach ($sub_items->subCategory as $childItems)
                @include('backend.product.child_category', ['sub_items' => $childItems])
            @endforeach 
        @endif
    </ul>
@endif