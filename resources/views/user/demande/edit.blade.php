@extends('template.layout')
@section('menu')
    @include('user.menu')
@endsection
@section('title')
 edit demande
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0">edit demande</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">demande</a></li>
                      <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">edit demande</h3>
            </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
                <div class="col-6 mx-auto">
                    
                    <div class="form-group col-7 mx-auto">
                        
                            <label>veuillez choisir l'objet de votre requête:  </label>
                            <select class="form-control" style="width: 100%;" id="choix" name="motif">
                                <option  selected>veuillez choisir une catégorie de problème</option>
                                <option id="id_1" value="logiciel">logiciel</option>
                                <option id="id_2" value="materiel">materiel</option>
                                <option id="id_3" value="reseau">reseau</option>
                            </select>
                        
                    </div>
                    <div class="col-7 mx-auto">
                        <div id="description" style="display: block;">
                            <span style="display: flex; justify-content: center;">
                                <i class="fas fa-exclamation-triangle"></i>   
                            </span>
                            <p style="text-align: center;"> veuillez choisir une option</p>
                        </div>
                    </div>    
                </div>
                
            
                <form id="champ-1" class="@error('description') show @enderror" style="display: none;" method="POST" action="{{route('demande.store')}}">
                    @csrf
                    <div class="col-6 mx-auto">
                        <div class="form-group col-7 mx-auto">
                            <label>objet de votre requête:  </label>
                            <select class="form-control" style="width: 100%;" id="choix" name="motif" disabled>
                                <option selected value="{{$demande->motif}}">{{$demande->motif}}</option>
                            </select>
                            <input type="hidden" name="motif" value="{{$demande->motif}}"/>
                        </div> 
                    </div>
                        
                        <div class="col-6 mx-auto">
                            <div class="row g-2">
                                <div class="col-7 mx-auto">
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Poste</label>
                                        <input type="text" class="@error ('poste') is-invalid @enderror form-control" id="exampleInputEmail1" value="{{$demande->poste}} " name="poste" placeholder="Entrer votre poste occupé">
                                        @error ('poste')
                                            <div class="invalid-feedback" role= "alert"><strong>{{$message}}</strong></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-7 mx-auto">
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">description du problème</label>
                                        <textarea class="@error ('libelle') is-invalid  @enderror form-control"  name="libelle" placeholder="decrivez votre problème">{{$demande->libelle}}</textarea>
                                        @error ('libelle')
                                            <div class="invalid-feedback" role="alert"><strong>{{$message}}</strong></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-7 mx-auto">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Date de depot</label>
                                        <input type="text" name="date" value="{{$demande->date}}" class="form-control text-center" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                                    </div>
                                </div>
                            </div>
                        </div>                   
                    <div class="card-footer" id="submit">
                        <div class="row col-9 mx-auto">
                        <button type="submit" class="btn btn-success offset-2 col-3" >enregistrer</button>
                        <button type="reset" class="btn  btn-danger offset-1 col-3" >annuler</button>
                        </div>
                    </div>
                </form>
                <form id="champ-2"  style="display: none;" method="POST" action="{{route('materiel.store')}}">
                    @csrf         
                    <div class="col-6 mx-auto">
                        <div class="form-group col-7 mx-auto">
                            <label>objet de votre requête:  </label>
                            <select class="@error('motif') is-invalid @enderror form-control" style="width: 100%;" id="choix" name="motif"disabled>
                                <option selected value="materiel">materiel</option>
                                <input type="hidden" name="motif" value="materiel"/>
                            </select>
                            @error('motif')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>        
                    <div class="col-6 mx-auto">
                        <div class="row g-2">
                            <div class="col-7 mx-auto">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Poste</label>
                                    <input type="text" class="@error ('poste') is-invalid @enderror form-control" id="exampleInputEmail1" value="{{old('poste')}} " name="poste" placeholder="Entrer votre poste occupé">
                                    @error ('poste')
                                        <div class="invalid-feedback" role= "alert"><strong>{{$message}}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-7 mx-auto">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">description du problème</label>
                                    <textarea class="@error ('libelle') is-invalid  @enderror form-control"  name="libelle" placeholder="decrivez votre problème">{{old('ibelle') ? : ""}}</textarea>
                                    @error ('ibelle')
                                        <div class="invalid-feedback" role="alert"><strong>{{$message}}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-7 mx-auto">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date de depot</label>
                                    <input type="text" name="date_depot" value="{{\Carbon\Carbon::now()->format('20y-m-d')}}" class="form-control text-center" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                                </div>
                            </div>
                        </div>
                    </div>                   
                    <div class="card-footer" id="submit">
                        <div class="row col-9 mx-auto">
                        <button type="submit" class="btn btn-success offset-2 col-3" >enregistrer</button>
                        <button type="reset" class="btn  btn-danger offset-1 col-3" >annuler</button>
                        </div>
                    </div>    
                </form> 
                <form id="champ-3"  style="display: none;" method="POST" action="{{route('reseau.store')}}">
                    @csrf         
                    <div class="col-6 mx-auto">
                        <div class="form-group col-7 mx-auto">
                            <label>objet de votre requête:  </label>
                            <select class="@error('motif') is-invalid @enderror form-control" style="width: 100%;" id="choix" name="motif"disabled>
                                <option selected value="reseau">reseau</option>
                                <input type="hidden" name="motif" value="reseau"/>
                            </select>
                            @error('motif')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                        <div class="col-6 mx-auto">
                            <div class="row g-2">
                                <div class="col-7 mx-auto">
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Poste</label>
                                        <input type="text" class="@error ('poste') is-invalid @enderror form-control" id="exampleInputEmail1" value="{{old('poste')}} " name="poste" placeholder="Entrer votre poste occupé">
                                        @error ('poste')
                                            <div class="invalid-feedback" role= "alert"><strong>{{$message}}</strong></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-7 mx-auto">
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">description du problème</label>
                                        <textarea class="@error ('libelle') is-invalid  @enderror form-control"  name="libelle" placeholder="decrivez votre problème">{{old('ibelle') ? : ""}}</textarea>
                                        @error ('ibelle')
                                            <div class="invalid-feedback" role="alert"><strong>{{$message}}</strong></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-7 mx-auto">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Date de depot</label>
                                        <input type="text" name="date_depot" value="{{\Carbon\Carbon::now()->format('20y-m-d')}}" class="form-control text-center" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                                    </div>
                                </div>
                            </div>
                        </div>                   
                        <div class="card-footer" id="submit">
                            <div class="row col-9 mx-auto">
                            <button type="submit" class="btn btn-success offset-2 col-3" >enregistrer</button>
                            <button type="reset" class="btn  btn-danger offset-1 col-3" >annuler</button>
                            </div>
                        </div>
                </form>                           
            </div>
        </div>
    </div>
        

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    var select = document.getElementById('choix');
    var champOption1 = document.getElementById('champ-1');
    var champOption2 = document.getElementById('champ-2');
    var champOption3= document.getElementById('champ-3');
    var description= document.getElementById('description');

    // Afficher les champs spécifiques à l'option sélectionnée
    select.addEventListener('change', function() {
    if (select.value === 'logiciel') {
    champOption1.style.display = 'block';
    champOption2.style.display = 'none';
    champOption3.style.display ='none';
    description.style.display ='none';
    } else if (select.value === 'materiel') {
    champOption1.style.display = 'none';
    champOption2.style.display = 'block';
    champOption3.style.display = 'none';
    description.style.display ='none';
    }else if (select.value === 'reseau'){
    champOption1.style.display = 'none';
    champOption2.style.display = 'none';
    champOption3.style.display = 'block';
    description.style.display ='none';
    };
    });
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    });
</script>

       
@endsection

