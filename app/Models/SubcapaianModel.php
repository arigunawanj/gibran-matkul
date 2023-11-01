<?php

namespace App\Models;

use App\Models\MatkulModel;
use App\Models\KurikulumModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubcapaianModel extends Model
{
    use HasFactory;

    protected $table = 'subcapaian';
    protected $guarded = [];

    public function kurikulum()
    {
        return $this->belongsTo(KurikulumModel::class);
    }
    
    public function matkul()
    {
        return $this->belongsTo(MatkulModel::class);
    }
}
