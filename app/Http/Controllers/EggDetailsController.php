<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\EggData;

class EggDetailsController extends Controller
{
  public function getEggDetails($id) {
    $eggDetails = EggData::where('egg_data_id', $id)->orderBy('created_at', 'asc')->get();
    return $eggDetails;
  }

  public function createEggData(Request $request) {
    $this->validate($request, [
      'weight' => 'required',
      'length' => 'required',
      'width' => 'required'
    ]);

    $eggData = new EggData;
    $eggData->egg_data_id = $request->egg_data_id;
    $eggData->weight = $request->weight;
    $eggData->length = $request->length;
    $eggData->width = $request->width;
    $eggData->save();
    
    return Response()->json(array('success' => true, 'last_insert_id' => $eggData->id), 200);
  }
}
