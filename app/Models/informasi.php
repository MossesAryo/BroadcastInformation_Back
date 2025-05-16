<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class informasi extends Model
{
    protected $table = 'informasi';
    protected $primaryKey = 'IDInformasi';
    public $timestamps = true;

    protected $fillable = [
        'IDOperator',
        'IDKategoriInformasi',
        'Judul',
        'TanggalMulai',
        'TanggalSelesai',
        'Deskripsi',
        'Thumbnail',
        'TargetDepartemen',
        'Status'
    ];

    public function operator()
    {
        return $this->belongsTo(OperatorDepartemen::class, 'IDOperator');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriInformasi::class, 'IDKategoriInformasi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

}
