<?php

namespace App\Http\Controllers;
use Storage;
use App\Data;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    public function fetchData()
    {	
        

		$data = Storage::disk('local')->get('attributes.json');
		$datafr = json_decode($data);
        
        
        foreach($datafr as  $value)
        {
        //verif if data exisit
        if (Data::where('_id',$value->_id->{'$oid'})->count()==0)
        {
        
        $symbol = new Data;
        $symbol->_id= $value->_id->{'$oid'};  
        $symbol->default_value = $value->default_value;
        $symbol->code = $value->code;       
        $symbol->hierarchy_code = $value->hierarchy_code;
        $symbol->roles = $value->roles;
        $symbol->required = $value->required;
        $symbol->variant = $value->variant;
        $symbol->description_translations = $value->description_translations;
        $symbol->label = $value->label;
        foreach($value->label_translations as $loc)
        {
             $symbol->locale = $loc->locale;
             $symbol->value = $loc->value;
         }
         
       
        $symbol->requirement_level = $value->requirement_level;
        $symbol->values_list = $value->values_list;
        $symbol->type = $value->type;
        $symbol->example = $value->example;
        $symbol->type_parameter = $value->type_parameter;
        $symbol->description = $value->description;
       
        $symbol->save();
       }

                         
        }
		 return view('updatedata');
    }
     public function index()
    {


        $data = Data::take(10)->get();
        
        return view('datasyn')->with('data',$data);
    }
}
