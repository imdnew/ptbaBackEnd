@extends('layouts.backend')

@section('article', 'active')
@section('content')
<div class="title">
    COVID19 - Actualités
    <div class="float-right">
        <a href="{{ route('articles.create') }}" class="btn btn-success btn-sm">Nouvel Article</a>
    </div>
</div>
<div class="block" style="padding-bottom: 2rem;">
    <div class="table-responsive">
        <input type="hidden" id = "val-table" name="" value="article">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Date de création</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listes as $liste)
                    <tr>
                    <td class="text-center">{{ $liste->id }}</td>
                    <td><a href="{{ route( 'articles.show', ['article' => $liste->id]) }}">{{ $liste->title }}</a></td>
                    <td>{{ $liste->libelle }}</td>
                    <td>{{ $liste->created_at }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{route( 'articles.edit', [$liste->id])}}" data-toggle="tooltip" title="Modifier" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-toggle="modal" data-target="#destroyarticleModal" class="btn btn-xs btn-danger" onclick="supp({{ $liste->id }})" title="Supprimer"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Confirmation suppression Modal -->
  <div class="modal fade" id="destroyarticleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Supprimer un article</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Voulez-vous supprimer cet article ?
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_table" id="id_table">
          <button type="button" class="btn btn-sm btn-danger" id="btn-sup-secteur" onclick="del_row()">Oui</button>
          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Non</button>
        </div>
      </div>
    </div>
  </div>
<!-- End Confirmation suppression Modals -->

@endsection