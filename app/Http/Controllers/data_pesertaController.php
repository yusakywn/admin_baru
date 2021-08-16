<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_peserta;
use App\Exports\data_pesertaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class data_pesertaController extends Controller
{
  public function index()
{
  $users = data_peserta::all();
  return view('/data_peserta', ['users' => $users]);
}

public function export_data()
{
  return Excel::download(new data_pesertaExport, 'data_peserta.xlsx');
}

}
