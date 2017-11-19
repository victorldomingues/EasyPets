<?php

namespace App\Http\Controllers\Manager\Providers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Providers\ProviderRequest;
use Illuminate\Http\Request;
use App\Models\Provider;
use DateTime;

use Illuminate\Support\Facades\Auth;

class ProvidersController extends Controller
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
        $providers = Provider::orderBy('created_at', 'desc')->get();

        return view('manager.providers.providers', ['providers' => $providers]);
    }
  
    public function create()
    {
        return view('manager.providers.providers-new');
    }
  
    public function store(ProviderRequest $request)
    {
        $provider = new Provider;
        $provider->name          = $request->name;
        $provider->documenttype          = $request->documenttype;
        $provider->document   = $request->document;
        $provider->deleted       = 0;
        $provider->created_by    = Auth::user()->id;
        $provider->status        = $request->status;
        $provider->save();
        return redirect()->route('manager.providers')->with('message', 'Forncedor cadastrado com sucesso!');
    }
  
    public function show($id)
    {
        $provider = Provider::findOrFail($id);
        return view('manager.providers.providers-show', compact('provider'));
    }
  
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        return view('manager.providers.providers-new', compact('provider'));
    }
  
    public function update(ProviderRequest $request, $id)
    {
        $provider = Provider::findOrFail($id);
        $provider->name          = $request->name;
        $provider->documenttype          = $request->documenttype;
        $provider->document   = $request->document;
        $provider->updated_by    = Auth::user()->id;
        $provider->status        = $request->status;
        $provider->save();
        return redirect()->route('manager.providers')->with('message', 'Forncedor atualizado  com sucesso!');
    }
  
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->updated_by    = Auth::user()->id;
        $provider->deleted_by    = Auth::user()->id;
        $provider->deleted       = 1;
        $provider->deleted_at    = new DateTime();
        $provider->save();
        return redirect()->route('manager.providers')->with('alert-success', 'Forncedor removido com sucesso!');
    }
}
