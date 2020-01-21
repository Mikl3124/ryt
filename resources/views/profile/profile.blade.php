@extends('layouts.app')


@section('title')
  Enregistrement des rôles | RYT
@endsection


@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-center">Mon profil</h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        </div>
                @endif
              </div>
              <div class="card-body">
              <h5>Mes coordonnées</h5>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">                      
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Email</th>
                      <th>Adresse</th>
                      <th>Code Postal</th>
                      <th>Ville</th>
                      <th>Rôle</th>
                      <th>Nombre d'annonces</th>
                      <th>Editer</th>
                      <th>Supprimer</th>


                    </thead>
                    <tbody>
                                     
                      
                      <tr>                        
                        <td> {{ $user->lastname }}</td>
                        <td> {{ $user->firstname }}</td>
                        <td> {{ $user->email }}</td>
                        <td> {{ $user->address }}</td>
                        <td> {{ $user->cp }}</td>
                        <td> {{ $user->town }}</td>
                        <td>                 
                        <?php switch ($user->role) {
                                case 'customer':
                                  echo'Client';
                                  break;
                                case 'admin':
                                  echo"Administrateur";
                                  break;
                                case 'driver':
                                  echo "Livreur";
                                  break;                       
                                default:
                                  echo"aucun";
                                    break;
                          } ?>

                          </td>
                          <td class="text-center"> {{ $user->tools->count() }}</td>                                               
                          <td>
                              <a href="/profile-edit/{{ $user->id }}" class="btn btn-success">Editer</a>
                          <td>
                              <form action="/user-delete/{{ $user->id }}" method="post">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                              <input type="hidden" name="id" value=" {{ $user->id }}">
                              <button type="submit" class="btn btn-danger">Supprimer</button>     
                              </form>
                          </td>
                      </tr>
                           
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

            <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
              </div>
              <div class="card-body">
                <h5>Mes annonces publiées</h5>          
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary text-center">
                      <th>Titre</th>
                      <th>Description</th>
                      <th>Prix</th>
                      <th>Photo</th>
                      <th>Editer</th>
                      <th>Supprimer</th>


                    </thead>
                    <tbody>
                        @foreach ($tools as $tool)
                      <tr>
                        <td> {{ $tool->title }}</td>
                        <td> {{ $tool->description }}</td>
                        <td> {{ $tool->price }} €/jour</td>
                        <td>
                        <div class="img-square-wrapper">
                                <img class="img-fluid img-thumbnail" width="125" src="{{$tool->image}}" alt="{{$tool->name}}">

                        </div>
                        </td>
                        <td>
                            <a href="/mypost-edit/{{ $tool->id }}" class="btn btn-success">Editer</a>
                        <td>
                            <form action="/mypost-delete/{{ $tool->id }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            <input type="hidden" name="id" value=" {{ $tool->id }}">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                          </td>
                      </tr>
                        @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

</div>


          
</div>
        

@endsection
