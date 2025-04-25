<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class operatordepartemen extends Model
{
    protected $table = 'operator_departemen';
    protected $primaryKey = 'IDOperator';
    public $timestamps = false;

    protected $fillable = ['ID_Departemen', 'name', 'NamaOperatorDepartemen'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'ID_Departemen');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'name');
    }

    public function informasi()
    {
        return $this->hasMany(Informasi::class, 'IDOperator');
    }

}
