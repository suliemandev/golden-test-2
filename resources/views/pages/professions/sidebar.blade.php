<h3 class="title-5 m-b-25">Professions</h3>
<div style="background-color: #fff; padding: 15px; position: relative;">
    @if($profession)
    <form action="#" onsubmit="submit_update_profession(event, '{{ $profession->id }}')" class="profession-update-form">
        <!-- DATA TABLE -->
        <h5 class="mb-2">#{{$profession->id}}</h5>
        <div class="form-group">
            <input type="text" name="title_ar" data-json="title" placeholder="*التخصص بالعربية" class="form-control mb-2" required value="{{ $profession->title['ar'] }}">
            <input type="text" name="title_he" data-json="title" placeholder="התמחות בעברית" class="form-control mb-2" value="{{ $profession->title['he'] }}">
            <input type="text" name="title_en" data-json="title" placeholder="Profession English" class="form-control mb-2" value="{{ $profession->title['en'] }}">
            <select class="form-control" name="trendID" required>
                <option selected="selected">Trends</option>
                @foreach($trends as $trend)
                <option value="{{$trend->id}}" {{ $trend->id == $profession->trend_id ? 'selected' : '' }}>{{ $trend->title['ar'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Save <div class="loader sidebar-loader" style="display:none;"></div></button>
        </div>
    </form>
    @else
    <div class="alert alert-warning mb-0">No profession selected</div>
    @endif
    <!-- END DATA TABLE-->
</div>