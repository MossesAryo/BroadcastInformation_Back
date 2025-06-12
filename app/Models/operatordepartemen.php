<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class operatordepartemen extends Model
{
    protected $table = 'operator_departemen';
    protected $primaryKey = 'IDOperator';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['ID_Departemen', 'username', 'NamaOperatorDepartemen'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'ID_Departemen');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'username','username');
    }

    public function informasi()
    {
        return $this->hasMany(Informasi::class, 'IDOperator');
    }

}
