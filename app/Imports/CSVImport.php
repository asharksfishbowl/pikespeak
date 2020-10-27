<?php

namespace App\Imports;

use App\Models\CSV;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CSVImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

      $alert = 'normal';
      $bloodCheck = ($row['systolic_a'] + $row['systolic_b']) +
                    ($row['diastolic_a'] + $row['diastolic_b']) / 4
      ;
      if($bloodCheck < 80){
        $alert = 'low';
      }
      else if($bloodCheck < 90 && $bloodCheck > 120){
        $alert = 'normal';
      }
      else if($bloodCheck > 140){
        $alert = 'high';
      }

      return new CSV([
        'name'         => $row['name'],
        'email'        => $row['email'],
        'systolic_a'   => $row['systolic_a'],
        'systolic_b'   => $row['systolic_b'],
        'diastolic_a'  => $row['diastolic_a'],
        'diastolic_b'  => $row['diastolic_b'],
        'alert'        => $alert
      ]);
    }
}
