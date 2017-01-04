<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\EggData;

class EggDetailsController extends Controller
{
  public function getEggDetails($id) {
    $eggDetails = EggData::where('egg_data_id', $id)->orderBy('created_at')->get();
    return $eggDetails;
  }
}
