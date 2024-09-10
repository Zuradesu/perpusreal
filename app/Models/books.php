<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categories;
use App\Models\pinjam;

class books extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(categories::class, 'categories_id');
    }

    public function pinjam()
    {
        return $this->hasMany(pinjam::class, 'buku_id');
    }
    protected $primarykey = "id";

    protected $fillable = [
        'kode_buku',
        'nama',
        'categories_id',
        'status' => 'Ada',
        'gambar',
    ];
}
