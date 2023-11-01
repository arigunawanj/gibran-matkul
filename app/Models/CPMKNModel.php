<?php

namespace App\Models;

use App\Models\CPLModel;
use App\Models\KurikulumModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CPMKNModel extends Model
{
    use HasFactory;
    protected $table = 'cpmk';
    protected $guarded = [];

    public function kurikulum()
    {
        return $this->belongsTo(KurikulumModel::class);
    }

    public function m_cpl()
    {
        return $this->belongsTo(CPLModel::class);
    }
}
