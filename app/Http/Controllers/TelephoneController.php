<?php

namespace App\Http\Controllers;
use App\Models\Telephone;
use Faker\Provider\Image;
use Illuminate\Http\Request;

use App\Models\Telephone_img;
use Illuminate\Support\Facades\Storage;

class TelephoneController extends Controller
{
    public function createtelephone(Request $request){

    
        $t = new Telephone();
        $t->nom = $request->nomproduit;
        $t->description = $request->description;
        $t->prix = $request->prix;
        $t->marque = $request->marque;
        $t->nbr_produit = 5;
        $t->nbr_visite = 0;
        $t->admin_id = 4;
        $t->per_solde = $request->solde;
        $t->ram = $request->ram;
        $t->stockage = $request->stockage;
        $t->back_cam_reslolution = $request->camera;
        $t->selfy_cam_resolution = $request->selfie;
        $t->taille_ecron = $request->ecran;
        $t->battery = $request->batterie;
        $t->save();
        
        $tid = Telephone::where('id_tele','=',$t->id)->first();
        if ($request->has('images')) {
            $imgs = $request->images;
           
            foreach($imgs as $img){
                $ti = new Telephone_img();
                $name = time() . '_' .$img->getClientOriginalName();
                $img->storeAs('public/images/'.$tid->nom.'/', $name);
                $ti->path = 'images/'. $tid->nom.'/' . $name;
                $ti->tele_id = $tid->id_tele;
                $ti->save();
            }
        }else{
                dd('imag makayanash');
            }
    }
 
    public function showPhones()
    {
        $al = Telephone::all();
        $collect = collect();

        foreach($al as $t){
            $allimg = Telephone_img::where('tele_id','=',$t->id_tele)->get();
            $collect->push([
                'imgs' => $allimg , 'telephones' => $t
            ]);
        }
       /*foreach($collect as $col){

            dd($col['imgs'][0]->path);
        }*/
       return view('home', compact('collect'));

    }

    public function showPhone($id)
    {
        
            $tele = Telephone::where('id_tele','=',$id)->first();
            $allimg = Telephone_img::where('tele_id','=',$tele->id_tele)->get();

        return view('telephone.showphone', compact('tele','allimg'));

    }

}
