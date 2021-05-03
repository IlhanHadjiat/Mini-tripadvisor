<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissement;
use Illuminate\Support\Facades\Validator;

class EtablissementController extends Controller
{

    public function index()
    {
        $posts = Etablissement::get();
        return view('posts.index', compact('posts'));
    }

    private $etablissements;
    public function __construct()
    {
        $this->etablissements = new Etablissement();
    }
    public function fiche($etablissement_id)
    {
        $etablissements = $this->etablissements->select('nom', 'adresse', 'ville', 'code_postal', 'pays')
                ->where('id', $etablissement_id)
                ->first();
        return view('posts.fiche')->with('posts', $etablissements);
    }

    public function indexPost()
    {
        $posts = Etablissement::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost()
    {
        return view('posts.create');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'adresse' => 'required',
        ]);

  
        $post = new Etablissement;
        $post->title = $request->input('nom');
        $post->body = $request->input('adresse');
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect('/')->with('success', 'Post Created');
    }

    function getAll(){ 
        return Etablissement::all();
    }

    function getByID($id){ 
        return Etablissement::findOrFail($id);
    }

    function create(Request $request) { 
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'code_postal' =>'required',
            'pays' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(['Message' => 'Etablissement not created : A field is missing.'], 400);
        } else {
            $etablissement = Etablissement::CreateDTOtoObject($request);

            $etablissement->save();

            return response($etablissement, 201);
        }
    }

    function delete($id){
        $etablissement = Etablissement::findOrFail($id);

        if ($etablissement){
            $etablissement->delete();
            return response()->json(['Message' => 'Etablissement has been deleted.'], 200);
        } else {
            return response()->json(['Message' => 'Operation failed : Etablissement does not exist.'], 400);
        }
    }

}