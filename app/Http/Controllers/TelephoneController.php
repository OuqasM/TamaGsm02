<?php

namespace App\Http\Controllers;
use App\Models\Telephone;
use Faker\Provider\Image;
use Illuminate\Http\Request;

use App\Models\Telephone_img;
use Illuminate\Support\Facades\Storage;

class TelephoneController extends Controller
{
    public function stroimg(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $ti = new Telephone_img();
        $t = Telephone::where('id_tele','=',$request->id)->first();
        if($t != null){
        if ($request->has('image')) {

                $img = $request->image;

                $name = time() . '_' .$img->getClientOriginalName();
                $request->file('image')->storeAs('public/images/'.$t->nom.'/', $name);
                $ti->path = 'images/'. $t->nom.'/' . $name;
                $ti->tele_id = $request->id;
                $ti->save();
            }
            else{
                dd('imag makayanash');
            }
        }else{
            dd('telephone makaynsh');
        }
        dd($img->getClientOriginalExtension());
    }

    public function showAllImg(Request $request,$id)
    {
        $t = Telephone::where('id_tele','=',$id)->first();

        $allimg = Telephone_img::where('tele_id','=',$id)->get();
        foreach($allimg as $img)
        echo $img->path.'  ';
        return view('telephone.show', compact('allimg','t'));
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
