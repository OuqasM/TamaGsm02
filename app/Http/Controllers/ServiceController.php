<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Service;

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

    public function GetAllServices()
    {
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

        }else{
            $s->image = '../images/no-image.png';
            $s->save();
            return redirect()->route('editsrv',$s->id)->with('failed','Service crée sans images');
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
}
