<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MeritListDataImport implements ToCollection
{
    private $importedRows;
    public function collection(Collection $collection)
    {
        $this->importedRows = $collection;
    }
    public function getRows()
    {
        return $this->importedRows;
    }
    public function getRowsArray()
    {
        return $this->importedRows->skip(1)->toArray();
    }
}
