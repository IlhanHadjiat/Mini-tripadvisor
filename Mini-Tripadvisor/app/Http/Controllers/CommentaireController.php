<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Validator;

class CommentaireController extends Controller
{
    function getAll(){
        return Commentaire::all();
    }

    function getByID($id){
        return Commentaire::findOrFail($id);
    }

    function getAllFromEtablissement($id){
        return (Commentaire::where('etablissement_id', $id)->get());
    }

    function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'Commentaire' => 'required',
            'auteur' => 'required',
            'note' => 'required',
            'etablissement_id' =>'required',
        ]);

        if ($validator->fails()){
            return response()->json(['Message' => 'Commentaire not created : A field is missing.'], 400);
        } else {
            $commentaire = Commentaire::CreateDTOtoObject($request);

            $commentaire->save();

            return response($commentaire, 201);
        }
    }


    function delete($id){
        $commentaire = Commentaire::findOrFail($id);

        if ($commentaire){
            $commentaire->delete();
            return response()->json(['Message' => 'Commentaire has been deleted.'], 200);
        } else {
            return response()->json(['Message' => 'Operation failed : Commentaire does not exist.'], 400);
        }
    }
}

