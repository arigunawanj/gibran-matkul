<?php

namespace App\Models;

use App\Models\CPMKNModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CPLModel extends Model
{
    use HasFactory;
    protected $table = 'm_cpl';
    protected $guarded = [];

    public function cpmk()
    {
        return $this->hasMany(CPMKNModel::class);
    }
}
