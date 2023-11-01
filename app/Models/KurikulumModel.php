<?php

namespace App\Models;

use App\Models\CPMKNModel;
use App\Models\MatkulModel;
use App\Models\SubcapaianModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KurikulumModel extends Model
{
    use HasFactory;
    protected $table = 'kurikulum';
    protected $guarded = [];

    public function cpmk()
    {
        return $this->hasMany(CPMKNModel::class);
    }

    public function matkul()
    {
        return $this->hasMany(MatkulModel::class);
    }
    public function subcapaian()
    {
        return $this->hasMany(SubcapaianModel::class);
    }
}
