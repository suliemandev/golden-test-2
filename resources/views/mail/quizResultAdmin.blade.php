<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">

<div style="width: 100%; max-width: 600px; margin: 0 auto; font-family: sans-serif;">

    @php $client = $quiz->client; @endphp
    <h3>Client details</h3>
    <ul>
        <li>Name: {{ $client ? $client['name'] : '-' }}</li>
        <li>Email: {{ $client ? $client['email'] : '-' }}</li>
        <li>Phone: {{ $client ? $client['phone'] : '-' }}</li>
        <li>City: {{ $client ? $client['address'] : '-' }}</li>
        <li>Birth year: {{ $client ? $client['birth_year'] : '-' }}</li>
        <li>Math units: {{ $client ? $client['math_units'] : '-' }}</li>
        <li>English units: {{ $client ? $client['english_units'] : '-' }}</li>
        <li>Psychometric: {{ $client ? $client[''] : '-' }}</li>
        <li>Study abroad: {{ $client ? $client['psychometric'] : '-' }}</li>
        <li>Helped: {{ $client ? $client['study_abroad'] : '-' }}</li>
        <li>Birth: {{ $client ? $client['helped'] : '-' }}</li>
        <li>Expectations: {{ $client ? $client['expectations'] : '-' }}</li>
    </ul>
</div>


