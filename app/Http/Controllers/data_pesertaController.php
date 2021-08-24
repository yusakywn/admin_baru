<?php

namespace App\Http\Controllers;

use App\Models\lomba;
use App\Models\data_peserta;
use Illuminate\Http\Request;
use App\Exports\data_pesertaExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

class data_pesertaController extends Controller
{
  public function index()
{
  $users = data_peserta::all();
  return view('/data_peserta', ['users' => $users]);
}

public function add_certificate(Request $request)
{
  $lomba = lomba::where('uuid', $request->uuid)->first();
  data_peserta::where('competition_id', $lomba->id)->update([
    'certificate' => 'events/competitions/certificate/' . $request->filename,
  ]);
  return back();
}

public function update_certificate(Request $request)
{
  data_peserta::where('user_id', $request->userid)->update([
    'certificate' => 'events/competitions/certificate/' . $request->filename,
  ]);
  return back();
}

public function export_data($id)
{
  $lomba = lomba::where('uuid', $id)->first();
  return Excel::download(new data_pesertaExport($lomba->id), 'data_peserta.xlsx');
}

}
