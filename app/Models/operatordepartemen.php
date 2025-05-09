<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class operatordepartemen extends Model
{
    protected $table = 'operator_departemen';
    protected $primaryKey = 'IDOperator';
    public $timestamps = true;

    protected $fillable = ['ID_Departemen', 'id_user', 'NamaOperatorDepartemen'];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'ID_Departemen');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function informasi()
    {
        return $this->hasMany(Informasi::class, 'IDOperator');
    }

}
