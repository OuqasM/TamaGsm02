<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessoir extends Model
{
    use HasFactory;
    protected $table = 'accessoirs';
    protected $primaryKey = 'id_acces';
    protected $fillable= [
        'id_acces','nom','description','type','prix','nbr_visite','per_solde','admin_id'
    ];

    public function accessoir_img()
    {
        return $this->belongsTo(Accessoir_img::class);
    }
}
