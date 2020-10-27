<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\CSV;

use App\Exports\CSVExport;
use App\Imports\CSVImport;
use Maatwebsite\Excel\Facades\Excel;

class CsvController extends Controller
{
  /**
   * @return \Illuminate\Support\Collection
   */
   public function importExportView()
   {
      $data= DB::select('select * from csv');
      return view('welcome', ['data'=>$data]);
   }

   /**
   * @return \Illuminate\Support\Collection
   */
   public function export()
   {
       return Excel::download(new CSVExport, 'csvData.xlsx');
   }

   /**
   * @return \Illuminate\Support\Collection
   */
   public function import()
   {
       Excel::import(new CSVImport,request()->file('file'));

       return back();
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
      CSV::where('id', $id)->delete();
      return redirect()->back()->with('success','Delete Successfully');
    }
}
