<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function createService(Request $request){

    
        $s = new Service();
        $s->nom = $request->nom;
        $s->desctiption = $request->description;
        $s->prix = $request->prix;
    
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
    public function showService($id)
    {        
        $service = Service::find($id)->first();
        return view('service.showservice', compact('service'));

    }

    public function editServices()
    {
       $services = Service::all();
       return view('service.manage', compact('services'));
    }
    public function deleteService(Request $request){

        Service::find($request->id)->delete();
        return redirect()->route('getallServices')->with('success','Service bien suprimée');

    }

    public function editService($id){
        $service = Service::find($id);
        return view('service.edit', compact('services'));

    }
    public function Updatetelephone(Request $request){

    
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

                return redirect()->route('createsrvview')->with('success','Service bien crée ');

        }else{
            $s->image = '../images/no-image.png';
            $s->save();
            return redirect()->route('createsrvview')->with('failed','Service crée sans images');
        } 
    }
    public function deleteimage(Request $request){

        $image_path = public_path().'/storage/'.$request->path;
            if(Storage::disk('public')->exists($request->path)){
                unlink($image_path);
            }
            return response('done');
    }
}
