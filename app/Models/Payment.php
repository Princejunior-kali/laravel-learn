<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $primaryKey = 'matricule';

    public $incrementing = false;

    // Disable timestamps if not using created_at and updated_at
    public $timestamps = true;

    // Define fillable fields
    protected $fillable = [
        'matricule',
        'amount',
    ];
}