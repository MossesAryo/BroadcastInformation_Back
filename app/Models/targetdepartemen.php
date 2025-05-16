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
    public function departemen()
    {
        return $this->belongsTo(KategoriInformasi::class, 'ID_Departemen');
    }

    public function informasi()
    {
        return $this->belongsTo(OperatorDepartemen::class, 'IDInformasi');
    }
}
