<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\books;

class pinjam extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->belongsTo(books::class, 'buku_id');
        // return $this->belongsTo(books::class);
    }

    protected $table = 'pinjam';
    protected $primarykey = "id";

    protected $fillable = [
        'nama_peminjam',
        'kelas',
        'buku',
        'tanggal_dipinjam', 
    ];
}
