<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadsModel extends Model
{
    use HasFactory;
    protected $table="leads";
    protected $fillable = [
        'lead_name', 'phone_number', 'email', 'location', 
        'property_type', 'budget_from', 'budget_to', 'bedrooms', 'bathrooms', 
        'move_in_date', 'interest_level', 'heard_about', 'language'
    ];
}
