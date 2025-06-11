<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class targetdepartemen extends Model
{
     protected $table = 'targetdepartemen';
    protected $primaryKey = 'IDTargetDepartemen';
    public $timestamps = true;

    protected $fillable = [
        'ID_Departemen',
        'IDInformasi',
    ];
    public function informasi()
    {
        return $this->belongsTo(Informasi::class, 'IDInformasi', 'IDInformasi');
    }
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'ID_Departemen', 'ID_Departemen');
    }
}
