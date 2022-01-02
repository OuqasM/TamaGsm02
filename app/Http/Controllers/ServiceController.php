<?php

namespace App\Http\Controllers;
use App\Models\Aime;
use App\Models\Visiteur;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function ShowAllServices(){
        $al = Service::all();
        return view('service.home', compact('al'));
    }

    public function createService(Request $request){
        $s = new Service();
        $s->nom = $request->nom;
        $s->description = $request->description;
        $s->prix = $request->prix;
        $s->nbr_visite = 0;
        $s->admin_id = Auth::user()->id;
        if ($request->has('image')) {
            $img = $request->image;
                $decodedimage = json_decode($img);
                $name = time() . '_' . $decodedimage->name;
                Storage::put('public/images/services/'. $name, base64_decode($decodedimage->data));
                $s->image = 'images/services/'. $name;
                $s->save();
                return redirect()->route('createsrvview')->with('success','Service bien crée ');
        }else{
            $s->image = '../images/no-image.png';
            $s->save();
            return redirect()->route('createsrvview')->with('failed','Service crée sans images');
        }
    }

    public function showService($id){
        $service = Service::find($id)->first();
        return view('service.showservice', compact('service'));
    }

    public function GetAllServices(){
       $services = Service::all();
       return view('service.manage', compact('services'));
    }

    public function deleteService(Request $request){
        $service = Service::find($request->id);
        $r = new Request();
        $r->path = $service->image;
        $this->deleteimage($r);
        $service->delete();
        return response('done');
    }

    public function editService($id){
        $service = Service::find($id);
        return view('service.edit', compact('service'));
    }

    public function UpdateService(Request $request){
        $s = Service::find($request->id);
        $s->nom = $request->nom;
        $s->description = $request->description;
        $s->prix = $request->prix;
        if ($request->has('image')) {
                $r = new Request();
                $r->path = $s->image;
                $this->deleteimage($r);
                $img = $request->image;
                $decodedimage = json_decode($img);
                $name = time() . '_' . $decodedimage->name;
                Storage::put('public/images/services/'. $name, base64_decode($decodedimage->data));
                $s->image = 'images/services/'. $name;
                $s->save();
                return redirect()->route('editsrv',$s->id)->with('success','Service bien Modifié ');

        }else if($s->image !=''){
            $s->save();
            return redirect()->route('editsrv',$s->id)->with('success','Service bien Modifié sans image');
        }else{
                $s->image = '../images/no-image.png';
                $s->save();
                return redirect()->route('editsrv',$s->id)->with('failed','Service modifié avec l\'image par defaut');
        }
    }

    public function deleteimage(Request $request){
        if($request->path != '../images/no-image.png'){

            $image_path = public_path().'/storage/'.$request->path;
            if(Storage::disk('public')->exists($request->path)){
                unlink($image_path);
            }
            $service = Service::where('image','=',$request->path)->first();
            $service->image = '';
            $service->save();
            return response('done');
        }
        else {
            return response('lla');
        }
    }

    public function LikeSrv(Request $request){

        $visiteur = Visiteur::where('email',$request->email)->first();
        if(isset($visiteur)){
            $a = Aime::where('id_visiteur',$visiteur->id)->where('id_produit',$request->id)
                ->where('produit','service')->get();
            if($a->count()>0){
                // deja aimée
                return response('Merci pour votre réaction',200);
            }
            else{
                // visiteur exist mais pas encore aimer ce produit
                $s = Service::find($request->id);
                $s->nbr_visite += 1;
                $s->save();

                $j = new Aime();
                $j->id_visiteur = $visiteur->id;
                $j->id_produit = $request->id;
                $j->produit = 'service';
                $j->save();
                return response('Merci pour votre réaction',200);
            }
        }
        else{
            // visiteur pour premier fois
            $t = Service::find($request->id);
            $t->nbr_visite += 1;
            $t->save();

            $v = new Visiteur();
            $v->email = $request->email;
            $v->save();

            $j = new Aime();
            $j->id_visiteur = $v->id;
            $j->id_produit = $request->id;
            $j->produit = 'service';
            $j->save();
            return response('Merci pour votre réaction',200);
        }
    }

}
