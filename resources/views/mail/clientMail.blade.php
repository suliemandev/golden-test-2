<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">

<div style="width: 100%; max-width: 600px; margin: 0 auto; font-family: sans-serif;">
    <h3>Quiz details</h3>

    <h5 class="mb-2">Top Trends</h5>
    <div class="table-responsive m-b-40">
        <table style="width: 100%">
            <thead>
                <tr>
                    <th style="width: 20px; text-align: center; padding: 3px">#</th>
                    <th style="width: 200px; text-align: left; padding: 3px">Trends</th>
                    <th style="width: 20px; text-align: center; padding: 3px">Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quiz->trends as $key => $trend)
                    <tr>
                        <td style="padding: 3px; text-align: center; background: {{ $key < 3 ? '#aaffaa' : 'transparent' }}">{{ $key+1 }}</td>
                        <td style="padding: 3px; background: {{ $key < 3 ? '#aaffaa' : 'transparent' }}">
                            <span>{{ isset($trend->title) ? $trend->title['ar'] : 's' }}</span>
                        </td>
                        <td style="padding: 3px; text-align: center; background: {{ $key < 3 ? '#aaffaa' : 'transparent' }}">
                            {{ $trend->points }}
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>


    <h5 class="mb-2">Top Professions</h5>
    @foreach(collect($quiz->trends)->take(3) as $key => $trend)
        <div>
            <div>{{ $trend->title['ar'] }}</div>
            <div style="display: flex; flex-wrap: wrap; margin-top: 3px; margin-bottom: 10px">
                @foreach($trend->professions as $profession)
                    <div style="padding: 4px; background: #ccc; margin-right: 5px; margin-bottom: 5px; border-radius: 3px">
                        {{ $profession->title['ar'] ?? '' }}
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach 
</div>


