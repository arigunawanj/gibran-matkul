<?php

namespace App\Models;

use App\Models\KurikulumModel;
use App\Models\SubcapaianModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatkulModel extends Model
{
    use HasFactory;
    protected $table = 'matkul';
    protected $guarded = [];

    public function kurikulum()
    {
        return $this->belongsTo(KurikulumModel::class);
    }
    
    public function subcapaian()
    {
        return $this->hasMany(SubcapaianModel::class);
    }
}
