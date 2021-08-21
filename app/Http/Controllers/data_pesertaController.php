<?php

namespace App\Http\Controllers;

use App\Models\lomba;
use App\Models\data_peserta;
use Illuminate\Http\Request;
use App\Exports\data_pesertaExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class data_pesertaController extends Controller
{
  public function index()
{
  $users = data_peserta::all();
  return view('/data_peserta', ['users' => $users]);
}

public function export_data($id)
{
  $lomba = lomba::where('uuid', $id)->first();
  return Excel::download(new data_pesertaExport($lomba->id), 'data_peserta.xlsx');
}

}
