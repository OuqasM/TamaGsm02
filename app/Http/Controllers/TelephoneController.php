<?php

namespace App\Http\Controllers;
use App\Models\Telephone;
use Faker\Provider\Image;
use Illuminate\Http\Request;

use App\Models\Telephone_img;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TelephoneController extends Controller
{
    public function createtelephone(Request $request){

    
        $t = new Telephone();
        $t->nom = $request->nomproduit;
        $t->description = $request->description;
        $t->prix = $request->prix;
        $t->marque = $request->marque;
        $t->nbr_visite = 0;
        $t->admin_id = 3;
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
                $decodedimage = json_decode($img);
                $name = time() . '_' . $decodedimage->name;
                
                    
                Storage::put('public/images/telephones/'.$tid->marque.'/'. $name, base64_decode($decodedimage->data));
                $ti->path = 'images/telephones/'. $tid->marque.'/' . $name;
                $ti->tele_id = $tid->id_tele;
                $ti->save();
                return redirect('/createTI')->with('success','Telephone bien crée');

            }
        }else{
            $ti = new Telephone_img();
            $ti->path = '../images/no-image.png';
            $ti->tele_id = $tid->id_tele;
            $ti->save();
            return redirect('/createTI')->with('failed','Telephone bien crée sans images');
        }
    }
 
    public function showPhones()
    {
        $al = Telephone::all();
        $collect = collect();

        foreach($al as $t){
            $allimg = Telephone_img::where('tele_id','=',$t->id_tele)->get();
            $collect->push([
                'imgs' => $allimg, 
                'telephones' => $t
            ]);
        }

       return view('home', compact('collect'));

    }
    public function showPhone($id)
    {
        
            $tele = Telephone::where('id_tele','=',$id)->first();
            $allimg = Telephone_img::where('tele_id','=',$tele->id_tele)->get();

        return view('telephone.showphone', compact('tele','allimg'));

    }
    public function editphones()
    {
        $al = Telephone::all();

        $collect = collect();

        foreach($al as $t){
            $allimg = Telephone_img::where('tele_id','=',$t->id_tele)->get();
            $user = User::where('id','=',$t->admin_id)->first();
            $collect->push([
                'imgs' => $allimg, 
                'telephones' => $t,
                'user' =>$user
            ]);
        }
        
       
       return view('telephone.edit', compact('collect'));

    }


}
