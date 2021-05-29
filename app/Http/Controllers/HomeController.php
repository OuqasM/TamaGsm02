<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telephone;
use App\Models\Telephone_img;
use App\Models\User;
use App\Models\Accessoir;
use App\Models\Accessoir_img;
class HomeController extends Controller
{
    public function showAll()
    {
        $al = Telephone::all();
        $collectA = collect();
        $collect = collect();

        $ala = Accessoir::all();
        foreach($ala as $ai){
            $allai = Accessoir_img::where('acces_id','=',$ai->id_acces);
            $collectA->push([
                'aimgs'=> $allai,
                'acss' => $ai
            ]);
        }

        foreach($al as $t){
            $allimg = Telephone_img::where('tele_id','=',$t->id_tele)->get();
            $collect->push([
                'imgs' => $allimg, 
                'telephones' => $t
            ]);
        }

       return view('welcome', compact('collect'));

    }
}
