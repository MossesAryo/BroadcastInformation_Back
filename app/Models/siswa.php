<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'ID_Siswa';
    public $timestamps = false;

    protected $fillable = ['Nama_Siswa', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

}
