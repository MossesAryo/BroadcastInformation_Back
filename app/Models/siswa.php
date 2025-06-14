<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'ID_Siswa';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['ID_Siswa','Nama_Siswa', 'username'];

    public function user()
    {
        return $this->belongsTo(User::class, 'username','username');
    }

}
