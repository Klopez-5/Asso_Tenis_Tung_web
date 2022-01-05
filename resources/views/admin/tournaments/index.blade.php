@extends('admin.layouts.dashboard')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="row py-lg-2">
                <div class="col-md-6">
                    <h2 class="m-0 font-weight-bold text-dark">Torneos</h2>
                </div>
                @can('haveaccess','tournaments.create')
                <div class="col-md-6">
                    <a href="/tournaments/create" class="btn btn-success btn-lg float-md-right" role="button" aria-pressed="true">
                        Agregar Torneo
                    </a>
                </div>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Afiche</th>
                        <th>Titulo/Nombre</th>
                        <th>Lugar</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Documentos</th>
                        <th>Operaciones</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Afiche</th>
                        <th>Titulo/Nombre</th>
                        <th>Lugar</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Documentos</th>
                        <th>Operaciones</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($tournaments as $tournament)
                        <tr>
                            <td>{{$tournament['id']}}</td>
                            <td><img src="{{asset('storage/images/tournaments_images/'.$tournament['afiche_url']) }}" alt="{{$tournament['afiche_url']}}" width="100"></td>
                            <td>{{$tournament['name']}}</td>
                            <td>{{$tournament['site']}}</td>
                            <td>{{$tournament['date']}}</td>
                            <td>{{$tournament['state']}}</td>
                            <td>
                                @isset($tournament['reglamento_url'])
                                    <a target="_blank" href="{{asset('storage/pdfs/tournaments_pdf/'.$tournament['reglamento_url'])}}">Reglamento</a>
                                    <br>
                                @endisset
                                @isset($tournament['protocolo_url'])
                                    <a target="_blank" href="{{asset('storage/pdfs/tournaments_pdf/'.$tournament['protocolo_url'])}}">Protocolo</a>
                                        <br>
                                @endisset
                                @isset($tournament['resultados_url'])
                                    <a target="_blank" href="{{asset('storage/pdfs/tournaments_pdf/'.$tournament['resultados_url'])}}">Resultados</a>
                                @endisset
                            </td>
                            <td>
                                <a  href="/tournaments/{{$tournament['id']}}/form">Inscribirme</a>
                                <br>
                                @can('haveaccess','tournaments.create')
                                <a href="/tournaments/{{$tournament['id']}}"><i class="fa fa-eye"></i></a>
                                @endcan
                                @can('haveaccess','tournaments.edit')
                                <a href="/tournaments/{{$tournament['id']}}/edit"><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('haveaccess','tournaments.destroy')
                                <a  href="#" data-toggle="modal" data-target="#deleteModal" data-tournamentid="{{$tournament['id']}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">¿Desea eliminar este registro?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    @isset($tournament)
                    <form method="POST" action="/tournaments/{{$tournament['id']}}">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" id="tournament_id" name="tournament_id" value="">
                        <a class="btn btn-danger" onclick="$(this).closest('form').submit();">Eliminar</a>
                    </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js_post_page')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var tournament_id = button.data('tournamentid')

            var modal = $(this)
            modal.find('.modal-footer #tournament_id').val(tournament_id);
            //modal.find('form').attr('action','/posts/' + post_id);
        })
    </script>
@endsection
