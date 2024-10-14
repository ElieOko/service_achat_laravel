<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'workspace',
        'first_name',
        'middle_name',
        'last_name',
        'company_name',
        'email',
        'phone_number',
        'note',
        'display_name'
    ];
}
