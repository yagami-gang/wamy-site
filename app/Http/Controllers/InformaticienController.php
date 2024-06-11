<?php 

namespace App\Http\Controllers;
use App\Models\Demande;
use Illuminate\Http\Request;

class InformaticienController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $demandes = Demande::select('id', 'statut', 'motif', 'date', 'libelle')
                   ->orderBy('date', 'asc')
                   ->paginate(30);
   return view('informaticien.demande.index',compact('demandes'));
  }

  public function home()
    {
        return view('informaticien.home');
    }
  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
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
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
  public function validation($id)
  {
    $demande = Demande::find($id);
    $demandes->statut = 'en_cours';
    $message = 'demande mis à jour avec succès';
    session()->flash('message',$message);
    return redirect()->back();
  }
}

?>