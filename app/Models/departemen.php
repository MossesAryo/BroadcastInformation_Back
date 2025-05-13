<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{
    protected $table = 'departemen';
    protected $primaryKey = 'ID_Departemen';
    protected $fillable = ['Nama_Departemen', 'Email_Departemen', 'Tanggal_Dibuat'];
    public $timestamps = true;


    public function operatorDepartemen()
    {
        return $this->hasMany(OperatorDepartemen::class, 'ID_Departemen');
    }

}
