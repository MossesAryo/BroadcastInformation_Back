<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'ID_Guru';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['ID_Guru','Nama_Guru', 'username'];

    public function user()
    {
        return $this->belongsTo(User::class, 'username','username');
    }

}
