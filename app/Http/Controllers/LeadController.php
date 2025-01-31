<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeadsModel;
use League\Csv\Writer;
use SplTempFileObject;
use Illuminate\Support\Facades\Response;
use App\Services\ExotelService;
class LeadController extends Controller
{
    protected $exotelService;
    public function __construct(ExotelService $exotelService)
    {
        $this->exotelService = $exotelService;
    }
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
       // $headers = ['id', 'assigned_rm_id', 'min_budget', 'max_budget','conversion_probability','email','interaction_history','last_contact_date','name','phone','preferences','sentiment','source','status','created_at','updated_at'];
        $output = fopen('php://output', 'w');
        
        return response()->json([
            'message' => 'Leads data fetched successfully',
            'data' => $arrLeads
        ]);
    }

    public function exportLeadsToCsv()
    {
        // Fetch leads data from the database, adjust columns based on your database structure
        $leads = LeadsModel::all(); 
        // Create a temporary file
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->setDelimiter(',');

        // Insert the header row into the CSV file
        $csv->insertOne(['id', 'assigned_rm_id', 'min_budget', 'max_budget','conversion_probability','email','interaction_history','last_contact_date','name','phone','preferences','sentiment','source','status','created_at','updated_at'
        ,'amenities','industry','location','property_type','additional_preferences','visit_scheduled','last_visit_date','rm_assigned_at']);
        // Insert the data rows into the CSV file
        foreach ($leads as $lead) { 
            $phone = '+' . $lead->phone;
            $csv->insertOne([
                (string)$lead->id,
                $lead->assigned_rm_id,
                $lead->min_budget,
                $lead->max_budget,
                $lead->conversion_probability,
                $lead->email,
                $lead->interaction_history,
                $lead->last_contact_date->setTimezone('UTC')->format('Y-m-d H:i:sP'),
                $lead->name,
                $lead->phone,
                $lead->preferences,
                $lead->sentiment,
                $lead->source,
                $lead->status,
                $lead->created_at->setTimezone('UTC')->format('Y-m-d H:i:sP'),
                $lead->updated_at->setTimezone('UTC')->format('Y-m-d H:i:sP'),
                $lead->amenities,
                $lead->industry,
                $lead->location,
                $lead->property_type,
                $lead->additional_preferences,
                $lead->visit_scheduled,
                $lead->last_visit_date->setTimezone('UTC')->format('Y-m-d H:i:sP'),
                $lead->rm_assigned_at->setTimezone('UTC')->format('Y-m-d H:i:sP'),
            ]);
        }

        // Prepare the response to download the file
        $csvContent = $csv->getContent();
        return Response::make($csvContent, 200, [
            'Content-Type' => 'application/csv',
            'Content-Disposition' => 'attachment; filename="leads.csv"',
        ]);
        dd("file downloaded successfully");
    }
    
    public function callLead(Request $request)
    {
        $request->validate(['phone' => 'required|numeric']);

        $response = $this->exotelService->makeCall($request->phone);

        return response()->json($response);
    }
    
}
