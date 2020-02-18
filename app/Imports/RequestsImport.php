<?php

namespace App\Imports;

use App\ot_tbl;
use App\agency;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
// use Maatwebsite\Excel\Concerns\WithMappedCells;     WithMappedCells
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Carbon\Carbon;

HeadingRowFormatter::default('none');
// use Maatwebsite\Excel\Concerns\WithHeadingRow;  , WithHeadingRow   

class RequestsImport implements ToModel, WithBatchInserts, WithChunkReading, WithHeadingRow, WithValidation, WithMultipleSheets
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function sheets(): array
    {
        return [
             new FirstSheetImport() 
        ];
    }
    public function rules(): array
    {
        return [
            'Name' => 'required|string',
            'department_id' =>  'required|int',
            'date' => 'required',
            'shift_id' =>  'required|int',
            'agency_id' => 'required|int',
            'job_content' =>  'required|string',
            'results' =>  'required|string',
            'time_from' =>  'required',
            'time_to' =>  'required',
            'time_hrs' =>  'required|int',
        ];
    }
    
    public function model(array $row)
    {
        return new ot_tbl([
            'name'     => $row['Name'],
            'department_id' => $row['department_id'],
            'date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']),
            'shift_sched' => $row['shift_id'],   
            'agency_id' => $row['agency_id'],
            'job_content' => $row['job_content'],
            'results' => $row['results'],
            'time_from' => $row['time_from'],
            'time_to' => $row['time_to'],
            'time_hrs' => $row['time_hrs'],
            ]);
    }
    
    public function batchSize(): int
    {
        return 1000;
    }
    public function chunkSize(): int
    {
        return 1000;
    }

    
}

