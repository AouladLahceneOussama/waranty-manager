@if($column == $name)
    @if($sortDesc)    
        <i class="fa-solid fa-sort-down"></i>
    @else
        <i class="fa-solid fa-sort-up"></i>
    @endif

@else
    <i class="fa-solid fa-sort"></i>
@endif