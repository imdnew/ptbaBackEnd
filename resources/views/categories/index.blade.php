@extends('layouts.backend')
@section('categorie', 'active')
@section('content')
<div class="title">
    COVID19 - Catégories
    <div class="float-right">
        <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">Nouvelle Catégorie</a>
    </div>
</div>
<div class="block" style="padding-bottom: 2rem;">
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listes as $liste)
                    <tr>
                    <td class="text-center">{{ $liste->id }}</td>
                    <td><a href="javascript:void(0)">{{ $liste->libelle }}</a></td>
                    <td>{{ $liste->description }}</td>
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