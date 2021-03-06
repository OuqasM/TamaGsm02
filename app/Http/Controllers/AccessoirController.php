<?php

namespace App\Http\Controllers;

use App\Models\Aime;
use App\Models\Visiteur;
use Illuminate\Http\Request;
use App\Models\Accessoir;
use App\Models\Accessoir_img;
use App\Models\User;
use App\Queries\AccessoireQuery;
use Illuminate\Support\Facades\Storage;
class AccessoirController extends Controller
{
    public function ShowAllAccessoirs(){
        $ala = Accessoir::all();
        $collectA = collect();
        foreach($ala as $ai){
            $allai = Accessoir_img::where('acces_id','=',$ai->id_acces)->get();
            $collectA->push([
                'aimgs'=> $allai,
                'acss' => $ai
            ]);
        }
        return view('accessoire.home', compact('collectA'));
    }

    public function createAcs(Request $request){


        $a = new Accessoir();
        $a->nom = $request->nom;
        $a->description = $request->description;
        $a->prix = $request->prix;
        $a->type = $request->type;
        $a->nbr_visite = 0;
        $a->admin_id = 3;
        $a->per_solde = $request->solde;
        $a->save();

        $aid = Accessoir::where('id_acces','=',$a->id_acces)->first();

        if ($request->has('images')) {
            $imgs = $request->images;

            foreach($imgs as $img){
                $ai = new Accessoir_img();
                $decodedimage = json_decode($img);
                $name = time() . '_' . $decodedimage->name;
                Storage::put('public/images/acs/'.$aid->type.'/'. $name, base64_decode($decodedimage->data));
                $ai->path = 'images/acs/'. $aid->type.'/' . $name;
                $ai->acces_id = $aid->id_acces;
                $ai->save();
            }
            return redirect()->route('createacsview')->with('success','Accessoir bien crée');

        }else{
            $ai = new Accessoir_img();
            $ai->path = '../images/no-image.png';
            $ai->acces_id = $aid->id_acces;
            $ai->save();
            return redirect()->route('createacsview')->with('failed','Accessoir bien crée sans images');
        }
    }

    public function GetAllAcss()
    {
        $al = Accessoir::all();

        $collect = collect();

        foreach($al as $a){
            $allimg = Accessoir_img::where('acces_id','=',$a->id_acces)->get();
            $user = User::where('id','=',$a->admin_id)->first();
            $collect->push([
                'imgs' => $allimg,
                'acss' => $a,
                'user' =>$user
            ]);
        }
       return view('accessoire.manage', compact('collect'));
    }

    public function editAcs($id){
        $acss = Accessoir::where('id_acces','=',$id)->first();
        $allimg = Accessoir_img::where('acces_id','=',$acss->id_acces)->get();
        return view('accessoire.edit', compact('acss','allimg'));
    }

    public function UpdateAcs(Request $request){


        $a = Accessoir::where('id_acces','=',$request->idAcs)->first();
        $a->nom = $request->nomproduit;
        $a->description = $request->description;
        $a->prix = $request->prix;
        $a->type = $request->type;
        $a->nbr_visite = 0;
        $a->admin_id = 3;
        $a->per_solde = $request->solde;
        $a->save();

        if ($request->has('images')) {
            $imgs = $request->images;

            foreach($imgs as $img){
                $ai = new Accessoir_img();
                $decodedimage = json_decode($img);
                $name = time() . '_' . $decodedimage->name;
                Storage::put('public/images/acs/'.$a->type.'/'. $name, base64_decode($decodedimage->data));
                $ai->path = 'images/acs/'. $a->type.'/' . $name;
                $ai->acces_id = $a->id_acces;
                $ai->save();
            }
            $imgs = Accessoir_img::where('acces_id','=',$a->id_acces)->get();
            foreach($imgs as $img){
                if($img->path == '../images/no-image.png'){
                    $rqs = new Request();
                    $rqs->id =$img->id;
                    $this->deleteimage($rqs);
                }
            }
            return redirect()->route('editacs',$a->id_acces)->with('success','Accessoire bien modifiée');
        }
        $imgs = Accessoir_img::where('acces_id','=',$a->id_acces)->get();
        if($imgs->count()>0){
            return redirect()->route('editacs',$a->id_acces)->with('failed','Accessoire Modifié sans image ajoutéé');
        }else{
            $ai = new Accessoir_img();
            $ai->path = '../images/no-image.png';
            $ai->acces_id = $a->id_acces;
            $ai->save();
            return redirect()->route('editacs',$a->id_acces)->with('success','Accessoire bien modifiée');

        }
    }
    public function deleteimage(Request $request){

        $img = Accessoir_img::where('id','=',$request->id)->first();
        $image_path = public_path().'/storage/'.$img->path;
            if($img->path != '../images/no-image.png' && Storage::disk('public')->exists($img->path)){
                unlink($image_path);
            }
            Accessoir_img::where('id','=',$request->id)->delete();
            return response('done');
    }

    public function deleteAcs(Request $request){
        $allimg = Accessoir_img::where('acces_id','=',$request->id)->get();
        foreach($allimg as $img){
            $image_path = public_path().'/storage/'.$img->path;
            if($img->path != '../images/no-image.png' && Storage::disk('public')->exists($img->path)){
                unlink($image_path);
            }
        }
        $allimg = Accessoir_img::where('acces_id','=',$request->id)->delete();

        Accessoir::where('id_acces','=',$request->id)->delete();
        return response('done');

    }

    public function showacss($id)
    {

            $acs = Accessoir::find($id);
            $allimg = Accessoir_img::where('acces_id','=',$acs->id_acces)->get();

        return view('accessoire.showaccessoir', compact('acs','allimg'));

    }

    public function LikeAcs(Request $request){

        $visiteur = Visiteur::where('email',$request->email)->first();

        if(isset($visiteur)){
            $a = Aime::where('id_visiteur',$visiteur->id)->where('id_produit',$request->id)
                ->where('produit','accessoir')->get();
            if($a->count()>0){
                // deja aimée
                return response('Vous avez déja aimé ce produit',200);
            }
            else {
                // visiteur exist mais pas encore aimer ce produit
                $t = Accessoir::find($request->id);
                $t->nbr_visite += 1;
                $t->save();

                $j = new Aime();
                $j->id_visiteur = $visiteur->id;
                $j->id_produit = $request->id;
                $j->produit = 'accessoir';
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
            $j->produit = 'accessoir';
            $j->save();
            return response('Merci pour votre réaction',200);
        }

    }

}
