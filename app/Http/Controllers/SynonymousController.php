<?php

namespace App\Http\Controllers;
use App\Synonymous;
use Illuminate\Http\Request;

class SynonymousController extends Controller
{
     public function store(Request $request)
    {
        if($request->get('name') != null)
         {
         $syn = new Synonymous;
         $syn->syn_id= $request->get('syn_id'); 
         $syn->name= $request->get('name');  
         $syn->save();
         return back()->with('success','Le nouveau synonyme a été enregistré avec succès');
         } else {
        return back()->with('error','le  champ Nom est obligatoire');}

    }
     public function update(Request $request)
     {
         
          $syn =  Synonymous::find($request->get('syn_id'));
          $syn->name= $request->get('name');  
          $syn->save();
          return back()->with('success','Le synonyme a été modifié avec succès');
     
     }




 	public function delete(Request $request)
     {
         
          $syn =  Synonymous::find($request->get('syn_id'));
          $syn->name= $request->get('name');  
          $syn->delete();
         
          return back()->with('success','Le synonyme a été Supprimé avec succès');
     }

   




}
