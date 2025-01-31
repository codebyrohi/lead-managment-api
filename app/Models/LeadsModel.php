<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadsModel extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $table="leads";
    protected $fillable = [
        'lead_name', 'phone_number', 'email', 'location', 
        'property_type', 'budget_from', 'budget_to', 'bedrooms', 'bathrooms', 
        'move_in_date', 'interest_level', 'heard_about', 'language','amenities','industry',
        'location','property_type','additional_preferences','visit_scheduled','last_visit_date','rm_assigned_at'
    ];
    protected $dates = [
        'last_contact_date','last_visit_date','rm_assigned_at'
    ];
}
