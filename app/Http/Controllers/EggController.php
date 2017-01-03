<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Egg;

class EggController extends Controller
{
  public function getEggs() {
    return Egg::all();
  }

  public function createEgg(Request $request) {
    $this->validate($request, [
      'egg_id' => 'required|unique:eggs',
      'initial_weight' => 'required',
      'initial_length' => 'required',
      'initial_width' => 'required'
    ]);

    $egg = new Egg;
    $egg->egg_id = $request->egg_id;
    $egg->initial_weight = $request->initial_weight;
    $egg->initial_length = $request->initial_length;
    $egg->initial_width = $request->initial_width;
    $egg->save();
    
    return Response()->json(array('success' => true, 'last_insert_id' => $egg->id), 200);
  }
}
