<?php

namespace App\Http\Controllers\Manager\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Products\ModelRequest;
use Illuminate\Http\Request;
use App\Models\Productmodel;
use DateTime;

use Illuminate\Support\Facades\Auth;

class ModelsController extends Controller
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
        $models = Productmodel::orderBy('created_at', 'desc')->get();

        return view('manager.products.models', ['models' => $models]);
    }
  
    public function create()
    {
        return view('manager.products.models-new');
    }
  
    public function store(ModelRequest $request)
    {
        $model = new Productmodel;
        $model->name          = $request->name;
        $model->description   = $request->description;
        $model->deleted       = 0;
        $model->created_by    = Auth::user()->id;
        $model->status        = $request->status;
        $model->save();
        return redirect()->route('manager.models')->with('message', 'Cor cadastrada com sucesso!');
    }
  
    public function show($id)
    {
        $model = Productmodel::findOrFail($id);
        return view('manager.products.models-show', compact('model'));
    }
  
    public function edit($id)
    {
        $model = Productmodel::findOrFail($id);
        return view('manager.products.models-new', compact('model'));
    }
  
    public function update(ModelRequest $request, $id)
    {
        $model = Productmodel::findOrFail($id);
        $model->name          = $request->name;
        $model->description   = $request->description;
        $model->updated_by    = Auth::user()->id;
        $model->status        = $request->status;
        $model->save();
        return redirect()->route('manager.models')->with('message', 'Cor atualizada com sucesso!');
    }
  
    public function destroy($id)
    {
        $model = Productmodel::findOrFail($id);
        $model->updated_by    = Auth::user()->id;
        $model->deleted_by    = Auth::user()->id;
        $model->deleted       = 1;
        $model->deleted_at    = new DateTime();
        $model->save();
        return redirect()->route('manager.models')->with('alert-success', 'Cor removida com sucesso!');
    }
}
