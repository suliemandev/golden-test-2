<h3 class="title-5 m-b-25">Trends</h3>
<div style="background-color: #fff; padding: 15px; position: relative;">
    @if($trend)
    <form action="#" onsubmit="submit_update_trend(event, '{{ $trend->id }}')" class="trend-update-form">
        <!-- DATA TABLE -->
        <h5 class="mb-2">#{{$trend->id}}</h5>
        <div class="form-group">
            <input type="text" name="title_en" data-json="title" placeholder="Question English" class="form-control mb-2" required value="{{ $trend->title['en'] }}">
            <input type="text" name="title_he" data-json="title" placeholder="שאלה בעברית" class="form-control mb-2" required value="{{ $trend->title['he'] }}">
            <input type="text" name="title_ar" data-json="title" placeholder="السوال بالعربية" class="form-control mb-2" required value="{{ $trend->title['ar'] }}">
        </div>
        <div class="form-check mb-4">
            <div class="checkbox">
                <label for="active" class="form-check-label">
                    <input type="checkbox" id="active" name="active" class="form-check-input" {{ $trend->active ? 'checked' : '' }}>Active
                </label>
            </div>
        </div>
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th style="text-align: left; padding-left: 20px;">Professions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($trend->professions))
                    @foreach($trend->professions as $key => $profession)
                    <tr trend-profession-data-id="{{$profession->id}}">
                        <td style="text-align: left;display:flex;align-items:center;justify-content:space-between">
                            <span>{{ $profession->title['en'] }}</span>
                            <span><a href="#!" onclick="delete_profession('{{$profession->id}}', true)" class="fa fa-times"></a></span>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="1" class="text-center">
                            <span>No professions found</span>
                        </td>
                    </tr>
                    @endif
                    <tr id="profession-area">
                        <td>
                            <a href="#" class="btn btn-block btn-secondary" onclick="add_profession_for_trend(event)"><i class="fa fa-plus"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Save <div class="loader sidebar-loader" style="display:none;"></div></button>
        </div>
    </form>
    @else
    <div class="alert alert-warning mb-0">No Trend selected</div>
    @endif
    <!-- END DATA TABLE-->
</div>