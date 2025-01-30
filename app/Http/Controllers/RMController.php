<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RelationshipManagerModel;
class RMController extends Controller
{
    public function generateRM()
    {
        $leads = RelationshipManagerModel::factory()->count(5)->create();
        return response()->json([
            'message' => 'RM data added successfully!',
            'data' => $leads
        ]);
    }

    public function fetchRMList()
    {
        $arrRMList = [];
        $objRM = RelationshipManagerModel::orderBy('id','desc')->get();
        if($objRM){
            $arrRMList =  $objRM->toArray();
        }
        return response()->json([
            'message' => 'data fetched successfully',
            'data' => $arrRMList
        ]);
    }
}
