@extends('admin.layouts.dashboard')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="row py-lg-2">
                <div class="col-md-6">
                    <h2 class="m-0 font-weight-bold text-dark">Categorias por Nivel</h2>
                </div>
                <div class="col-md-6">
                    <a href="/levels/create" class="btn btn-success btn-lg float-md-right" role="button" aria-pressed="true">
                        Agregar categoria por nivel
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Operaciones</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Operaciones</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($levels as $level)
                        <tr>
                            <td>{{$level['id']}}</td>
                            <td>{{$level['title']}}</td>
                            <td>
                                <a href="/levels/{{$level['id']}}/edit"><i class="fa fa-edit"></i></a>
                                <a  href="#" data-toggle="modal" data-target="#deleteModal" data-levelid="{{$level['id']}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
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
                    <form method="POST" action="/levels/{{$level['id']}}">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" id="level_id" name="level_id" value="">
                        <a class="btn btn-danger" onclick="$(this).closest('form').submit();">Eliminar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js_post_page')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var level_id = button.data('levelid')

            var modal = $(this)
            modal.find('.modal-footer #level_id').val(level_id);
            //modal.find('form').attr('action','/posts/' + post_id);
        })
    </script>
@endsection
