
<h3 class="title-5 m-b-25">Trends</h3>
<div style="background-color: #fff; padding: 15px; position: relative;">
    @if($question)
    <form action="#" onsubmit="submit_update_question(event, '{{ $question->id }}')" class="question-update-form">
        <!-- DATA TABLE -->
        <h5 class="mb-2">#{{$question->id}}</h5>
        <div class="form-group">
            <input type="text" name="title_ar" data-json="title" placeholder="السوال بالعربية*" class="form-control mb-2" required value="{{ $question->title['ar'] }}">
            <input type="text" name="title_he" data-json="title" placeholder="שאלה בעברית" class="form-control mb-2" value="{{ $question->title['he'] }}">
            <input type="text" name="title_en" data-json="title" placeholder="Question English" class="form-control mb-2" value="{{ $question->title['en'] }}">
        </div>
        <div class="form-check mb-4">
            <div class="checkbox">
                <label for="active" class="form-check-label">
                    <input type="checkbox" id="active" name="active" class="form-check-input" {{ $question->active ? 'checked' : '' }}>Active
                </label>
            </div>
        </div>
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th style="border-right: 1px solid #fff; padding-left: 20px;">Trend</th>
                        <th>Yes</th>
                        <th>No</th>
                        <th>Maybe</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($trends))
                    @foreach($trends as $key => $trend)
                    <tr>
                        <td style="padding-left: 20px;border-right:1px solid #333;">{{ $trend->title['ar'] }}</td>
                        @php $qpt = isset($question->points[$trend->id]) ? $question->points[$trend->id] : null; @endphp
                        <td>
                            <input type="number" name="points_{{$trend->id}}_yes" data-json="points" value="{{ $qpt && isset($qpt['yes']) ? $qpt['yes'] : 0 }}" class="form-control" style="width:60px;">
                        </td>
                        <td>
                            <input type="number" name="points_{{$trend->id}}_no" data-json="points" value="{{ $qpt && isset($qpt['no']) ? $qpt['no'] : 0 }}" class="form-control" style="width:60px;">
                        </td>
                        <td class="text-center">
                            <input type="number" name="points_{{$trend->id}}_maybe" data-json="points" value="{{ $qpt && isset($qpt['maybe']) ? $qpt['maybe'] : 0 }}" class="form-control" style="width:60px;">
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="text-center">
                            <span>No trends found</span>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Save <div class="loader sidebar-loader" style="display:none;"></div></button>
        </div>
    </form>
    @else
    <div class="alert alert-warning mb-0">No Question selected</div>
    @endif
    <!-- END DATA TABLE-->
</div>