@extends('layouts.master')
@section('content')
@section('header')
    @include('layouts.header', ['title' => 'Ajouter un utilisateur'])
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card card-primary col-md-6 mx-auto mb-4">

                    <div class="card-body">
                        @isset($user)
                            {!! Form::model($user, ['route' => ['users.update', $user->id]]) !!}
                            @method('PUT')
                        @else
                            {!! Form::open(['route' => 'users.store', 'files' => true]) !!}
                        @endisset
                        <div class="form-group">
                            {!! Form::label('name', 'Nom et prenom', []) !!}
                            <div class="input-group">

                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- /.input group -->

                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email', []) !!}
                            <div class="input-group">

                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- /.input group -->

                        </div>
                        <div class="form-group">
                            {!! Form::label('poste', 'Poste', ['class'=>'label-form']) !!}
                            <div class="input-group">

                                {!! Form::text('poste', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- /.input group -->

                        </div>
                        <div class="form-group">
                            {!! Form::label('Téléphone', 'Téléphone', ['class'=>'label-form']) !!}
                            <div class="input-group">

                                {!! Form::text('tel', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- /.input group -->

                        </div>
                        <div class="form-group">
                            {!! Form::label('equipe', 'Equipe', ['class'=>'label-form']) !!}
                            <div class="input-group">

                                {!! Form::select('equipe',$equipes, null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- /.input group -->

                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Image', ['class'=>'label-form']) !!}
                            <div class="input-group">

                                {!! Form::file('image', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- /.input group -->

                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Mot de passe', ['class'=>'label-form']) !!}
                            <div class="input-group">

                                {!! Form::password('password', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- /.input group -->

                        </div>

                        <button class="btn btn-success  " type="submit">Ajouter</button>
                    </div>

                    {!! Form::close() !!}
                    <!-- /.card-body -->
                    <!-- /.card-body -->
                </div>
            </div>
        </div>


    </div>
@endsection
