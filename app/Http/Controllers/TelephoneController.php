<?php

namespace App\Http\Controllers;
use App\Models\Telephone;
use Illuminate\Http\Request;

use App\Models\Telephone_img;
use App\Models\User;
use App\Models\Visiteur;
use App\Models\Aime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TelephoneController extends Controller
{
    public function ShowAllPhones(){
        $al = Telephone::orderBy('per_solde', 'DESC')->get();
        $collect = collect();
        $TopPromo = Telephone::orderBy('per_solde', 'DESC')->first();
        $promocollect = collect();
        $promoimg = Telephone_img::where('tele_id','=',$TopPromo->id_tele)->first();
        $promocollect->push([
            'telephone' => $TopPromo,
            'imgs' => $promoimg]);

        foreach($al as $t){
            $allimg = Telephone_img::where('tele_id','=',$t->id_tele)->get();
            $collect->push([
                'imgs' => $allimg, 
                'telephones' => $t
            ]);
        }
        return view('telephone.home', compact('collect','promocollect'));

    }
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

        
        $tid = Telephone::where('id_tele','=',$t->id_tele)->first();
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
            }
            return redirect()->route('createphoneview')->with('success','Telephone bien crée');

        }else{
            $ti = new Telephone_img();
            $ti->path = '../images/no-image.png';
            $ti->tele_id = $tid->id_tele;
            $ti->save();
            return redirect()->route('createphoneview')->with('failed','Telephone bien crée sans images');
        }
    }
    public function showPhone($id)
    {
            
            $tele = Telephone::find($id);
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
       return view('telephone.manage', compact('collect'));
    }
    public function deletephone(Request $request){
        $allimg = Telephone_img::where('tele_id','=',$request->id)->get();
        foreach($allimg as $img){
            $image_path = public_path().'/storage/'.$img->path;
            if($img->path != '../images/no-image.png' && Storage::disk('public')->exists($img->path)){
                unlink($image_path);
            } 
        }
        $allimg = Telephone_img::where('tele_id','=',$request->id)->delete();
        Telephone::where('id_tele','=',$request->id)->delete();
        return redirect()->route('getallphones')->with('success','Telephone bien suprimée');

    }
    public function editphone($id){
        $tele = Telephone::find($id);
        $allimg = Telephone_img::where('tele_id','=',$tele->id_tele)->get();
        return view('telephone.edit', compact('tele','allimg'));

    }
    public function deleteimage(Request $request){

        $img = Telephone_img::where('id','=',$request->id)->first();
        $image_path = public_path().'/storage/'.$img->path;
            if($img->path != '../images/no-image.png' && Storage::disk('public')->exists($img->path)){
                unlink($image_path);
            }
            Telephone_img::where('id','=',$request->id)->delete();
            return response('done');
    }
    public function Updatetelephone(Request $request){

    
        $t = Telephone::where('id_tele','=',$request->idphone)->first();
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

        if ($request->has('images')) {
            $imgs = $request->images;
           
            foreach($imgs as $img){
                $ti = new Telephone_img();
                $decodedimage = json_decode($img);
                $name = time() . '_' . $decodedimage->name;
                Storage::put('public/images/telephones/'.$t->marque.'/'. $name, base64_decode($decodedimage->data));
                $ti->path = 'images/telephones/'. $t->marque.'/' . $name;
                $ti->tele_id = $t->id_tele;
                $ti->save();
            }
            $imgs = Telephone_img::where('tele_id','=',$t->id_tele)->get();
            foreach($imgs as $img){
                if($img->path == '../images/no-image.png'){
                    $rqs = new Request();
                    $rqs->id =$img->id;
                    $this->deleteimage($rqs);
                }
            }
            return redirect()->route('editphone',$t->id_tele)->with('success','Telephone bien modifiée');
        }
        $imgs = Telephone_img::where('tele_id','=',$t->id_tele)->get();
        if($imgs->count()>0){ 
            return redirect()->route('editphone',$t->id_tele)->with('failed','Telephone Modifié avec sans image ajoutéé');
        }else{
            $ti = new Telephone_img();
            $ti->path = '../images/no-image.png';
            $ti->tele_id = $t->id_tele;
            $ti->save();
            return redirect()->route('editphone',$t->id_tele)->with('success','Telephone bien modifiée');

        }
    }
    public function LikePhone(Request $request){
        
        $visiteur = Visiteur::where('email',$request->email)->first(); 

        if(isset($visiteur)){
            $a = Aime::where('id_visiteur',$visiteur->id)->where('id_produit',$request->id)
            ->where('produit','telephone')->get();      
                if($a->count()>0){
                // deja aimée
                return response('Merci pour votre réaction',200);
                }
                else {
                    // visiteur exist mais pas encore aimer ce produit
                    $t = Telephone::find($request->id);
                    $t->nbr_visite += 1;
                    $t->save();
            
                    $j = new Aime();
                    $j->id_visiteur = $visiteur->id;
                    $j->id_produit = $request->id;
                    $j->produit = 'telephone';
                    $j->save();
                    return response('Merci pour votre réaction',200);
                }
        }
        else{
            // visiteur pour premier fois
            $t = Telephone::find($request->id);
            $t->nbr_visite += 1;
            $t->save();
          
            $v = new Visiteur();
            $v->email = $request->email;
            $v->save();
    
            $j = new Aime();
            $j->id_visiteur = $v->id;
            $j->id_produit = $request->id;
            $j->produit = 'telephone';
            $j->save();
            return response('Merci pour votre réaction',200);
        }    
       
    }
}
