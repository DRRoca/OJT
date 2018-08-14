<?php

namespace App\Http\Controllers;

use App\Notebook;
use Auth;

use Illuminate\Http\Request;

class NotebooksController extends Controller
{
    public function __construct()
    {

        $this->middleware('notebook.owner')->except('index');
    }

    public function index(){
        
        $user= Auth::user();
        $notebooks = $user->notebooks;
        
        //$notebooks=Notebook::all();

        return view('notebooks.index' , compact('notebooks'));
    }

    public function create(){
        return view('notebooks.create');
    }

    public function store(Request $request)
    {
        $dataInput= $request->all();
        $user= Auth::user();
        $user->notebooks()->create($dataInput);
        //Notebook::create($dataInput);

        return redirect('/notebooks');
    }
    public function show($id)
    {
        $notebook= Notebook::where('id',$id)->first();
        $notes= $notebook->notes;
        return view('notes.index',compact('notes','notebook'));
    }

    public function edit($id)
    {
        $user= Auth::user();
        $notebook= $user->notebooks()->find($id);
        //$notebook= Notebook::where('id', $id)->first();
        return view('notebooks.edit')->with('notebooks' ,$notebook) ;
    }
    public function update(Request $request, $id)
    {
        $user= Auth::user();
        $notebook= $user->notebooks()->find($id);
        //$notebook=Notebook::where('id', $id)->first();
        $notebook->update($request->all());

        return redirect('/notebooks');
    }
    public function destroy($id)
    {
        $user= Auth::user();
        $notebook= $user->notebooks()->find($id);
        //$notebook=Notebook::where('id', $id)->first();
        $notebook->delete();

        return redirect('/notebooks');
    }


}
