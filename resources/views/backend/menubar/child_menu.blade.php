<p style="padding-left:4px;margin-bottom: 2px">
    &nbsp  <i class='fas fa-long-arrow-alt-right'></i>
    {{$sub_items->title}} 
    &nbsp <i class="fa fa-edit" data-toggle="modal" data-target="#updatemenu{{$sub_items->id}}" style="font-size: 14px;color:#007bff"></i> | <i aria-hidden="true" class="fa fa-trash delete" href="{{route('dashboard.menubar.item.delete',$sub_items->id)}}" type="button" value="{{$sub_items->id}}" style="font-size: 14px;color:red;"></i> 
</p>
@if ($sub_items->subMenu)
    <div style="padding-left:15px;margin-bottom: 2px">
        @if(count($sub_items->subMenu) > 0)
            @foreach ($sub_items->subMenu as $childItems)
                @include('backend.menubar.child_menu', ['sub_items' => $childItems])
            @endforeach 
        @endif
    </div>
@endif