<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EtudiantImport implements ToCollection, WithStartRow, WithCustomCsvSettings, WithHeadingRow
{


    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }


    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

    }

    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function import($collections)
    {
        # - INITIALISATION
        $listEtudiants = $collections->lazy();

        foreach ($listEtudiants as $key => $line) {
            $row = $line->toArray();

        }

    }

}
