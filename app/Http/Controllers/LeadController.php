<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeadsModel;
class LeadController extends Controller
{
    public function generateLeads()
    {
        $leads = LeadsModel::factory()->count(5)->create();
        return response()->json([
            'message' => 'Leads generated successfully!',
            'data' => $leads
        ]);
    }

    public function fetchLeads()
    {
        $arrLeads = [];
        $leads = LeadsModel::orderBy('id','desc')->get();
        if($leads){
            $arrLeads =  $leads->toArray();
        }
        return response()->json([
            'message' => 'Leads data fetched successfully',
            'data' => $arrLeads
        ]);
    }
    
}
