<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecambah extends Model
{
    use SoftDeletes;

    protected $table = "kecambahs";
    protected $dates = ['deleted_at'];
       
    protected $primaryKey = 'kecambah_id';

    protected $fillable = [
        'nama', 'pembeli','jumlah', 'harga','jumlah_bayar'
    ];
}
