<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone_img extends Model
{
    use HasFactory;

    protected $table = 'telephone_imgs';
    protected $primaryKey = 'id';

    public function telephone()
    {
        return $this->belongsTo(Telephone::class);
    }
}
