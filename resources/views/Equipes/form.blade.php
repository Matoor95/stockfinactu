@extends('layouts.master')
@section('content')
@section('header')
    @include('layouts.header', ['title' => 'Ajouter une option'])
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card card-primary col-md-6 mx-auto mb-4">

                    <div class="card-body">
                        @isset($equipes)
                        {!! Form::model($equipes, ['route'=>['equipes.update',$equipes->id] ]) !!}
                        @method('PUT')
                        @else
                            {!! Form::open(['route' => 'equipes.store']) !!}
                        @endisset
                        <div class="form-group">
                            {!! Form::label('Location', 'Location', []) !!}
                            <div class="input-group">

                                {!! Form::text('location', null, ['class' => 'form-control']) !!}
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- Date mm/dd/yyyy -->



                        <button class="btn btn-success " type="submit">Ajouter</button>
                    </div>

                    {!! Form::close() !!}
                    <!-- /.card-body -->
                    <!-- /.card-body -->
                </div>
            </div>
        </div>


    </div>
@endsection
@endsection
