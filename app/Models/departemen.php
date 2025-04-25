<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{
    protected $table = 'departemen';
    protected $primaryKey = 'ID_Departemen';
    public $timestamps = false;

    protected $fillable = ['Nama_Departemen'];

    public function operatorDepartemen()
    {
        return $this->hasMany(OperatorDepartemen::class, 'ID_Departemen');
    }

}
