<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\books;

class categories extends Model
{
    use HasFactory;
    
    public function books()
    {
        return $this->hasMany(books::class);
    }
    protected $primarykey = "id";
    protected $fillable = [
        'nama',
    ];
}
