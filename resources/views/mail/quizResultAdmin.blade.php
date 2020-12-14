<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">

<div style="width: 100%; max-width: 600px; margin: 0 auto; font-family: sans-serif;">

    @php $client = $quiz->client; @endphp
    <h3>Client details</h3>
    <ul>
        <li>Name: {{ $client['name'] ? $client['name'] : '-' }}</li>
        <li>Email: {{ $client['email'] ? $client['email'] : '-' }}</li>
        <li>Phone: {{ $client['phone'] ? $client['phone'] : '-' }}</li>
        <li>City: {{ $client['address'] ? $client['address'] : '-' }}</li>
        <li>Birth year: {{ $client['birth_year'] ? $client['birth_year'] : '-' }}</li>
        <li>Math units: {{ $client['math_units'] ? $client['math_units'] : '-' }}</li>
        <li>English units: {{ $client['english_units'] ? $client['english_units'] : '-' }}</li>
        <li>Psychometric: {{ $client['psychometric']  ? $client['psychometric'] : '-' }}</li>
        <li>Study abroad: {{ $client['study_abroad'] ? $client['study_abroad'] : '-' }}</li>
        <li>Helped: {{ $client['helped'] ? $client['helped'] : '-' }}</li>
        <li>Expectations: {{ $client['expectations'] ? $client['expectations'] : '-' }}</li>
    </ul>
</div>


