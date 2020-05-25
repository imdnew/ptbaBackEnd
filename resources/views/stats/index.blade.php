@extends('layouts.backend')
@section('Declarations', 'active')
@section('content')
<div class="title">
    COVID19 - Déclarations
    <div class="float-right">
        <a href="{{ route('covidstats.create') }}" class="btn btn-success btn-sm">Nouvelle déclaration</a>
    </div>
</div>
<div class="block" style="padding-bottom: 2rem;">
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-left">Dat # Id</th>
                    <th>Ville</th>
                    <th>Sexe</th>
                    <th>Statut</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listes as $liste)
                    <tr>
                    <td class="text-left">{{ date('d/m/Y',strtotime($liste->dated)) }} # {{ $liste->id }}</td>
                    <td><a href="javascript:void(0)">{{ $liste->nom }}</a></td>
                    <td>{{ $liste->sexe }}</td>
                    <td>{{ $liste->typeenregistrement }}</td>
                    <td class="text-center">{{ $liste->nombrecas }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
