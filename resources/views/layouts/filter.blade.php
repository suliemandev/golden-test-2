<div class="table-data__tool">
    <div class="table-data__tool-left">
    {{--    <div class="rs-select2--light rs-select2--md">
            <select class="js-select2" name="property">
                <option selected="selected">All Properties</option>
                <option value="">Option 1</option>
                <option value="">Option 2</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <div class="rs-select2--light rs-select2--sm">
            <select class="js-select2" name="time">
                <option selected="selected">Today</option>
                <option value="">3 Days</option>
                <option value="">1 Week</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <button class="au-btn-filter"><i class="zmdi zmdi-filter-list"></i>filters</button> --}}
        <input type="text" class="form-control" placeholder="Search.." onkeyup="search_in_table(event, '{{$modal}}')">
    </div>
    <div class="table-data__tool-right">
        @if(!isset($disable_add))
        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#{{$modal_id}}">
            <i class="zmdi zmdi-plus"></i> add item
        </button>
        @endif
        {{-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
            <select class="js-select2" name="type">
                <option selected="selected">Export</option>
                <option value="">Option 1</option>
                <option value="">Option 2</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div> --}}
    </div>
</div>