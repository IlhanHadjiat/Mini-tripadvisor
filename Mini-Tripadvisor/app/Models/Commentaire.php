<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Commentaire extends Model
{
    use HasFactory;
    public $table = "commentaire";

    public static function CreateDTOtoObject(Request $request){
        $commentaire = new Commentaire();

        $commentaire ->commentaire = $request->commentaire;
        $commentaire ->auteur = $request->auteur;
        $commentaire ->note = $request->note;
        $commentaire ->etablissement_id = $request->etablissement_id;

        return $commentaire;
    }

}
