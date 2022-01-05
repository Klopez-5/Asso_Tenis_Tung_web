@extends('admin.layouts.dashboard')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-dark">{{$tournament->name}}</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/tournaments/{{$tournament->id}}/inscribir" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                <div class="row">
                    <div class="col-lg-6 text-container">
                        <div class="row">
                            @isset($tournament['site'])
                                <div class="form-group col-lg-6">
                                    <label class="mb-0 font-weight-bold text-gray-800 ul" for="site"><i><b>Lugar</b></i></label>
                                    <input  readonly type="text" name="site" class="form-control" id="site" value="{{ old('site',$tournament->site) }}">
                                </div>
                            @endisset
                            @isset($tournament['cost'])
                                <div class="form-group col-lg-6">
                                    <label class="mb-0 font-weight-bold text-gray-800 ul" for="cost"><i><b>Costo</b></i></label>
                                    <input readonly type="text" name="cost" class="form-control" id="cost"  value="{{ old('cost',$tournament->cost) }}">
                                </div>
                            @endisset
                            @isset($tournament['date'])
                                <div class="form-group col-lg-6">
                                    <label class="mb-0 font-weight-bold text-gray-800 ul" for="date"><i><b>Fecha de inicio</b></i></label>
                                    <input readonly type="date" name="date" class="form-control" id="date"  value="{{ old('date',$tournament->date) }}">
                                </div>
                            @endisset
                            @isset($tournament['state'])
                                <div class="form-group col-lg-6">
                                    <label class="mb-0 font-weight-bold text-gray-800 ul" for="state"><i><b>Estado del torneo</b></i></label>
                                    <input readonly type="text" name="state" class="form-control" id="state"  value="{{ old('date',$tournament->state) }}">
                                </div>
                            @endisset
                            @isset($tournament['address'])
                                <div class="form-group col-lg-12">
                                    <label class="mb-0 font-weight-bold text-gray-800 ul" for="address"><i><b>Dirección</b></i></label>
                                    <input readonly type="text" name="address" class="form-control" id="address"  value="{{ old('address',$tournament->address) }}">
                                </div>
                            @endisset
                            @isset($tournament['type_of_tournament'])
                                <div class="form-group col-lg-6">
                                    <label class="mb-0 font-weight-bold text-gray-800 ul" for="address"><i><b>Tipo de torneo</b></i></label>
                                    <input readonly type="text" name="state" class="form-control" id="state"  value="{{ old('type',$tournament->type_of_tournament) }}">
                                </div>
                            @endisset
                        </div>
                        <hr>
                        @isset($tournament['description'])
                            <div class="form-group">
                                <label class="mb-0 font-weight-bold text-gray-800 ul" for="date"><i><b>Descripción</b></i></label>
                                <div class="container">
                                    <p>{!!$tournament['description']!!}</p>
                                </div>
                            </div>
                        @endisset
                        <div class="mb-0 font-weight-bold text-gray-800 ul"><i><b>Documentos:</b></i>
                            @isset($tournament['reglamento_url'])
                                <li><a target="_blank" href="{{asset('storage/pdfs/tournaments_pdf/'.$tournament['reglamento_url'])}}">Reglamento</a></li>
                            @endisset
                            @isset($tournament['protocolo_url'])
                                <li><a target="_blank" href="{{asset('storage/pdfs/tournaments_pdf/'.$tournament['protocolo_url'])}}">Protocolo</a></li>
                            @endisset
                            @isset($tournament['resultados_url'])
                                <li><a target="_blank" href="{{asset('storage/pdfs/tournaments_pdf/'.$tournament['resultados_url'])}}">Resultados</a></li>
                            @endisset
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @isset($tournament['afiche_url'])
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                     src="{{asset('storage/images/tournaments_images/'.$tournament['afiche_url']) }}" alt="{{$tournament['afiche_url']}}">
                            </div>
                        @endisset
                        <br>
                    </div>

                </div>
                <div class="">
                    <hr>
                    <div class="container-fluid" id="deportista" style=" background: #f8f9fc; box-shadow: 2px 1px 2px 0.5px #bfbfbf; border: solid #ffffff 1px;" >
                        <br>
                            <h5 class="text-center m-0 font-weight-bold text-dark">Inscribirse en el torneo</h5>
                            <hr>
                            <div class="row text-center">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nameGroup">Nombre del Grupo</label>
                                        <input type="text" name="nameGroup" class="form-control" id="nameGroup" placeholder="Asignar un nombre a su equipo" value="{{ old('nameGroup') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4" >
                                    <div class="form-group">
                                        <label for="province_id">Provincia a la que pertenece</label>
                                        <select class="form-control" name="province_id" id="province_id">
                                            <option value="">-- Seleccionar provincia --</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="comprobante">Adjuntar comprobante de pago</label>
                                        <input type="file" name="comprobante" class="form-control-file" id="comprobante">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-0 font-weight-bold text-gray-800 ul"><i><b>Datos del 1er Participante:</b></i>
                            </div>
                            <div class=" text-center row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="carid1">Cédula</label>
                                        <input readonly type="text" name="carid1" class="form-control" id="carid1"  value="{{ Auth::user()->card_id}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name1">Nombres</label>
                                        <input readonly type="text" name="name1" class="form-control" id="name1"  value="{{ Auth::user()->name  }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="lastname1">Apellidos</label>
                                        <input readonly type="text" name="lastname1" class="form-control" id="lastname1"  value="{{ Auth::user()->last_name  }}">
                                    </div>
                                </div>
                            </div>
                            <div id="pareja">
                                <div class="mb-0 font-weight-bold text-gray-800 ul"><i><b>Datos del 2do Participante:</b></i>
                                </div>
                                <div class=" text-center row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="carid2">Cédula</label>
                                            <input type="text" name="carid2" class="form-control" id="carid2"  value="{{ old('carid2') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name2">Nombres</label>
                                            <input type="text" name="name2" class="form-control" id="name2"  value="{{ old('name2') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="lastname2">Apellidos</label>
                                            <input type="text" name="lastname2" class="form-control" id="lastname2"  value="{{ old('lastname2') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="equipo">
                                <div class="mb-0 font-weight-bold text-gray-800 ul"><i><b>Datos del 3er Participante:</b></i>
                                </div>
                                <div class=" text-center row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="carid3">Cédula</label>
                                            <input type="text" name="carid3" class="form-control" id="carid3"  value="{{ old('carid3') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name3">Nombres</label>
                                            <input type="text" name="name3" class="form-control" id="name3"  value="{{ old('name3') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="lastname3">Apellidos</label>
                                            <input type="text" name="lastname3" class="form-control" id="lastname3"  value="{{ old('lastname3') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0 font-weight-bold text-gray-800 ul"><i><b>Datos del 4to Participante:</b></i>
                                </div>
                                <div class=" text-center row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="carid4">Cédula</label>
                                            <input type="text" name="carid4" class="form-control" id="carid4"  value="{{ old('carid4') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name4">Nombres</label>
                                            <input type="text" name="name4" class="form-control" id="name4"  value="{{ old('name4') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="lastname4">Apellidos</label>
                                            <input type="text" name="lastname4" class="form-control" id="lastname4"  value="{{ old('lastname4') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                
                                <div class="mb-0 font-weight-bold text-gray-800 ul"><i><b>Descripción</b></i></div><br>
                                <textarea name="descripcionM" class="form-control" id="descripcionM" placeholder="Descripción..." >{{ old('descriptionM') }}</textarea>
                            </div>
                            <div class=" text-center form-group row">
                                <div class="col-lg-12">
                                    <input class=" btn btn-success btn-lg float-md-right" type="submit" value="Inscribir">
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="/vendor/jquery/jquery.js"></script>
    
    <script>
        CKEDITOR.replace('descripcionM');
    </script>
    <script type="text/javascript">
        function mostrar() {
            const typeT = {!! json_encode($tournament->type_of_tournament) !!};
            if (typeT == 'Single') {

                $("#pareja").hide();
                $("#equipo").hide();
            }
            if (typeT=='Dobles') {
                $("#equipo").hide();
            }
        }
        window.onload=mostrar;
    </script>
@endsection
