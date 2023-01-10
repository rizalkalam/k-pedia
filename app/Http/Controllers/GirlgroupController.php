<?php

namespace App\Http\Controllers;

use App\Models\Girlgroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GirlgroupController extends Controller
{
    public function index()
    {
        $data = Girlgroup::all();

        return response()->json(['girl-groups'=>$data]);
    }
}
