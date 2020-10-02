@if(isset($search_result))
    <h4>Results:</h4>
    <div class="search-results">
        <div>
            <h5>Questions</h5>
            <ul>
                @if(count($search_result['questions']))
                @foreach($search_result['questions'] as $item)
                <li><a href="/questions?item={{$item->id}}">{{ $item->title['ar'] }}</a></li>
                @endforeach
                @else
                <li>No results</li>
                @endif
            </ul>
        </div>
        <div>
            <h5>Trends</h5>
            <ul>
                @if(count($search_result['trends']))
                @foreach($search_result['trends'] as $item)
                <li><a href="/trends?item={{$item->id}}">{{ $item->title['ar'] }}</a></li>
                @endforeach
                @else
                <li>No results</li>
                @endif
            </ul>
        </div>
        <div>
            <h5>Professions</h5>
            <ul>
                @if(count($search_result['professions']))
                @foreach($search_result['professions'] as $item)
                <li><a href="/professions?item={{$item->id}}">{{ $item->title['ar'] }}</a></li>
                @endforeach
                @else
                <li>No results</li>
                @endif
            </ul>
        </div>
    </div>
@endif