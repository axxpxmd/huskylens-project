<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

// models
use App\Models\Data;

class HuskylensController extends Controller
{
    public function getDataFromHuskylens(Request $request)
    {
        $data = $request->json()->all();

        Log::channel('huskylens')->info('HuskyLens Data : ', $data);

        Data::create([
            'id_data' => $data['ID']
        ]);

        return response()->json(['message' => 'Data Received']);
    }
}
