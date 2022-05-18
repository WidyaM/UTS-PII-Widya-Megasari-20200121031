<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;
    protected $guarded = ['nama'];
    // merelasikan tabel frien dengan group 
    public function groups()
    {
        return $this->belongsTo(groups::class,'groups_id');
    }
}
