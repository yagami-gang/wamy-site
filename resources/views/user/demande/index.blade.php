@extends('template.layout')
@section('menu')
@include('user.menu')
@endsection
@section('title')
  historique du problème de type logiciel
@endsection
@section('content')
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0">Historique</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">historique</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="card card-primary">
            <div class="col-md-6 col-lg-12 mt-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">historique des demandes</h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <section class="col-md-12 table-responsive" >
                  <table class="table">
                    <thead>
                      <tr>
                        <th >#</th>
                        <th >motif</th>
                        <th>Date de dépôt</th>
                        <th>status</th>
                        <th >action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($demandes as $key => $demande)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <span class="badge  bg-indigo py-1">{{$demande->motif}}</span>
                            </td>
                            <td>{{$demande->date}}</td>
                            @php
                            $table = [
                                    'en_attente'=>'gradient-info',
                                    'en_cours'=>'gradient-secodary',
                                    'resolu'=>'gradient-success',
                                ];
                            @endphp
                            <td>
                                <span class="badge bg-{{$table[$demande->statut]}} py-1">{{$demande->statut}}</span>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <i class="col-5 fa fa-fw fa-ellipsis-v" data-toggle="dropdown"></i>  
                                    <div class="dropdown-menu">
                                        <a data-target="#suppression{{$demande->id}}" data-toggle="modal" class="dropdown-item"><i class="fa fa-trash text-danger"></i><span class="text-danger ml-2">Supprimer</span></a>
                                        <a href="{{route('demande.edit',$demande->id)}}" class="dropdown-item"><i class="fa fa-edit "></i><span  class ="ml-2">Editer</span></a>
                                        <a data-target="#info{{$demande->id}}" data-toggle="modal" class="dropdown-item"><i class="fa fa-eye "></i><span class ="ml-2" >description</span></a>
                                    </div>  
                                </div>    
                            </td>
                        </tr>

                        <!--modal de suppression d'infos-->
                        <div class="modal fade" id="suppression{{$demande->id}}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Infos</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                   Voulez-vous vraiment supprimer votre demande ?
                                </div>
                                <div class="modal-footer">
                                  <div class="row gx-8 mx-auto">
                                    <div class="col-8">
                                      <button class="btn btn-danger" data-bs-dismiss="modal">
                                        Non
                                      </button>
                                    </div>
                                    <div class="col-4">
                                      <a href="{{ route('demande.destroy',$demande->id) }}"  onclick="event.preventDefault();document.getElementById('delete-form{{$demande->id}}').submit();">
                                        <button class="btn btn-success">
                                          Oui
                                        </button>  
                                      </a>
                                      <form id="delete-form{{$demande->id}}" action="{{ route('demande.destroy',$demande->id) }}" method="POST" class="d-none">
                                        @method('DELETE')
                                        @csrf
                                       </form>
                                    </div>
                                  </div>            
                                </div>
                              </div>
                            </div>
                        </div>
                        <!--fin modal de suppression d'infos-->

                        <!--modal d'infos-->
                        <div class="modal fade" id="info{{$demande->id}}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Infos</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body text-center">
                                    {{$demande->libelle}} 
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- fin modal d'infos-->
                      @endforeach
                    </tbody>
                  </table>
                </section>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.card-header -->
          <!-- form start -->
    </div>
    </div>
@endsection
