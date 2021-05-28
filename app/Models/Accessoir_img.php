<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessoir_img extends Model
{
    use HasFactory; 
    protected $table = 'accessoir_imgs';
    protected $primaryKey = 'id';

    public function accessoir()
    {
        return $this->belongsTo(Accessoir::class);
    }
}
