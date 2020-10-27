<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function import(Request $request)
  {
       $request->validate([
          'import_file' => 'required|file|mimes:xls,xlsx'
      ]);

      $path = $request->file('import_file');
      $data = Excel::import(new UsersImport, $path);

      return response()->json(['message' => 'uploaded successfully'], 200);
  }
}
