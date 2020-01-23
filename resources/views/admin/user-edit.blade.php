@extends('layouts.app')

@section('title')
Edition des utilisateurs | RYT
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class ="text-center">Edition de l'utilisateur</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/user-register-update/{{$users->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                            <div class="form-group">
                                <label>Prénom</label>
                                <input type="text" name="firstname" value="{{ $users->firstname }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="lastname" value="{{ $users->lastname }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input type="text" name="email" value="{{ $users->email }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Adresse</label>
                                <input type="text" name="address" value="{{ $users->address }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Code Postal</label>
                                <input type="text" name="cp" value="{{ $users->cp }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ville</label>
                                <input type="text" name="town" value="{{ $users->town }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Attribuer un rôle</label>
                            </div>
                            <div class="form-group">
                                <select name="role">
                                    <option value="{{ $users->role }}"></option>
                                    <option value="admin">Administrateur</option>
                                    <option value="customer">Client</option>
                                    <option value="driver">Livreur</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Enregistrer la modification</button>
                                <a href="/user-register" type="submit" class="btn btn-danger">Annuler la modification</a>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
