@extends('layouts.backend')
@section('localite', 'active')
@section('content')
<div class="title">
    COVID19 - Localités
    <div class="float-right">
        <a href="{{ route('localites.create') }}" class="btn btn-success btn-sm">Nouveelle Localité</a>
    </div>
</div>
<div class="block" style="padding-bottom: 2rem;">
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('localites.create') }}" class="btn btn-default">Nouveau</a>
    </div>
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Code</th>
                    <th>Nom</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listes as $liste)
                    <tr>
                    <td class="text-center">{{ $liste->id }}</td>
                    <td><a href="{{ route( 'localites.show', ['localite' => $liste->id]) }}">{{ $liste->code }}</a></td>
                    <td>{{ $liste->nom }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{route( 'localites.edit', [$liste->id])}}" data-toggle="tooltip" title="Modifier" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
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
