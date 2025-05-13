<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'ID_Siswa';
    public $timestamps = true;

    protected $fillable = ['Nama_Siswa', 'id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
