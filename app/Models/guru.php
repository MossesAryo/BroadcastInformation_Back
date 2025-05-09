<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'ID_Guru';
    public $timestamps = false;

    protected $fillable = ['Nama_Guru', 'id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
