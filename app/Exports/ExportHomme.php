<?php
namespace App\Exports;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportHomme implements FromCollection
{
  public function collection()
  {
    return DB::select('select * from stats_sexe_villes');
  }
}