<?php

namespace App\Exports;

use App\Models\Quiz;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QuizzesExport implements FromQuery, WithMapping, WithHeadings
{

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        $query = Quiz::query();
        if(!empty($this->request['dateFrom'])) {
            $query = $query->where('created_at', '>=', $this->request['dateFrom']);
        }
        if(!empty($this->request['dateTo'])) {
            $query = $query->where('created_at', '<=', $this->request['dateTo']);
        }

        return $query;
    }

    public function map($quiz): array
    {
        return [
            $quiz->client->id,
            $quiz->client->name,
            $quiz->client->email,
            $quiz->client->phone,
            $quiz->client->address,
            $quiz->client->birth_year,
            $quiz->client->math_units,
            $quiz->client->english_units,
            $quiz->client->psychometric,
            $quiz->client->study_abroad,
            $quiz->client->expectations,
            $quiz->client->helped,
            $quiz->client->created_at
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Phone',
            'City',
            'Birth year',
            'Math units',
            'English units',
            'Psychometric',
            'Study abroad',
            'Expectations',
            'Helped',
            'Date'
        ];
    }
}
