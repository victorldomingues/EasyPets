<?php

namespace App\Http\Controllers\Manager\Adoptions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Adoptions\AdoptionRequest;
use Illuminate\Http\Request;
use App\Models\Adoption;
use DateTime;

use Illuminate\Support\Facades\Auth;

class AdoptionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('manager.adoptions.adoptions', ['adoptions' => $adoptions]);
    }  

    public function create()
    {
        return view('manager.adoptions.adoptions-new');
    }
  
    public function store(AdoptionRequest $request)
    {
        $adoption = new Adoption;
        $adoption->name           = $request->name;
        $adoption->documenttype   = $request->documenttype;
        $adoption->document       = $request->document;
        $adoption->deleted        = 0;
        $adoption->created_by     = Auth::user()->id;
        $adoption->status         = $request->status;
        $adoption->save();
        return redirect()->route('manager.adoptions')->with('message', 'Forncedor cadastrado com sucesso!');
    }
  
    public function show($id)
    {
        $adoption = AdoptionsRepository::getById($id);
        return view('manager.adoptions.adoptions-show', ['adoption' => $adoption]);
    }
  
    public function edit($id)
    {
        $adoption = Adoption::findOrFail($id);
        return view('manager.adoptions.adoptions-new', compact('adoption'));
    }
  
    public function update(AdoptionRequest $request, $id)
    {
        $adoption = Provider::findOrFail($id);
        $adoption->name           = $request->name;
        $adoption->documenttype   = $request->documenttype;
        $adoption->document       = $request->document;
        $adoption->updated_by     = Auth::user()->id;
        $adoption->status         = $request->status;
        $adoption->save();
        return redirect()->route('manager.adoptions')->with('message', 'Forncedor atualizado  com sucesso!');
    }
  
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->updated_by    = Auth::user()->id;
        $provider->deleted_by    = Auth::user()->id;
        $provider->deleted       = 1;
        $provider->deleted_at    = new DateTime();
        $provider->save();
        return redirect()->route('manager.adoptions')->with('alert-success', 'Forncedor removido com sucesso!');
    }
}
