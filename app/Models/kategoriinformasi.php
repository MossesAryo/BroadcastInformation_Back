<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategoriinformasi extends Model
{
    protected $table = 'kategori_informasi';
    protected $primaryKey = 'IDKategoriInformasi';
    public $timestamps = false;

    protected $fillable = ['NamaKategori', 'Deskripsi'];

    public function informasi()
    {
        return $this->hasMany(Informasi::class, 'IDKategoriInformasi');
    }

}
