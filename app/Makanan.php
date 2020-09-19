<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Makanan extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_makanan';

    protected $fillable = [
        'nama_makanan', 'harga_makanan', 'qty_makanan', 'gambar_makanan'
    ];
}
