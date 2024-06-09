<?php 

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $id = auth()->user()->id;
     $demandes = Demande::select('id','statut','motif','date','libelle')
                                 ->where('id_user',$id)
                                 ->where('motif','=','logiciel')
                                 ->orderBy('date','asc')
                                 ->paginate(30);
    return view('user.demande.index',compact('demandes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('user.demande.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $motif = $request->input('motif');
    $description = $request->input('libelle');
    $date = $request->input('date');
    $poste = $request->input('poste');

    $request->validate([
      'motif' => 'required|bail',
      'poste' => 'required|bail',
      'libelle' => 'required|bail',
      'date' => 'required|bail|date|after_or_equal:today'
    ]);

    $demande = new Demande;
    $demande->motif = $motif;
    $demande->libelle = $description;
    $demande->date = $date;
    $demande->id_user = auth()->user()->id;
    $demande->poste = $poste ;
    $demande->save();

    $message = 'demande de resolution sur le problème de type '.$motif.' effectuer';
    session()->flash('message',$message);
    return redirect()->route('demande.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $demande = Demande::FindOrFail($id);

    return view('user.demande.edit',compact('demande'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, Request $request)
  {
    $motif = $request->input('motif');
    $description = $request->input('libelle');
    $date = $request->input('date');
    $poste = $request->input('poste');

    $request->validate([
      'motif' => 'required|bail',
      'poste' => 'required|bail',
      'libelle' => 'required|bail',
      'date' => 'required|bail|date|after_or_equal:today'
    ]);

    $demande =Demande::FindOrFail($id);
    $demande->motif = $motif;
    $demande->libelle = $description;
    $demande->date = $date;
    $demande->id_user = auth()->user()->id;
    $demande->poste = $poste ;
    $demande->save();

    $message = 'demande mis a jour avec succès';
    session()->flash('message',$message);
    return redirect()->route('demande.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $demande = Demande::find($id);
    $demande->delete();
    $message = "demande supprimer avec succès";
    session()->flash('message',$message);
    return redirect()->route('demande.index');
  }
  
}

?>