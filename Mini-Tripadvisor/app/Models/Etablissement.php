<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Etablissement extends Model
{
    use HasFactory;

    public $table = "etablissement";
    public static function CreateDTOtoObject(Request $request){
        $etablissement = new Etablissement();

        $etablissement ->nom = $request->nom;
        $etablissement ->adresse = $request->adresse;
        $etablissement ->ville = $request->ville;
        $etablissement ->code_postal = $request->code_postal;
        $etablissement ->pays = $request->pays;

        return $etablissement;
    }
}