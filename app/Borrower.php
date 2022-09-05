<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use Uuid;

  	protected $fillable = [
        'monthly_sales',
        'monthly_expenses',
        'other_financing',
        'other_financing_amount',
        'legal_business_name',
        'business_physical_address',
        'business_physical_city',     
        'business_physical_province',
        'business_physical_postal',
        'email',
        'step',
        'dob'  
    ];
}
