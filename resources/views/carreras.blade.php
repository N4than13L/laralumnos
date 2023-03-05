@extends('plantilla')

{{-- seccion de contenido --}}
@section('contenido')
    <div class="row mt-3">
        <div class="col-md-4 offset-md-4">
            <div class="d-grid mx-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-bs-whatever="@mdo">
                    <li class="fa-solid fa-circle-plus"></li>&nbsp;Añadir
                </button>
            </div>
        </div>

    </div>

    {{-- Tabla de datos. --}}

    <div class="row mt-3">
        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Carrera</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        {{-- sacar informacion de la base de datos --}}
                        @php $i = 1 @endphp
                        @foreach ($carreras as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $row->carrera }}</td>

                                <td>
                                    <a href="{{ url('carreras', [$row]) }}" class="btn btn-warning">
                                        <li class="fa-solid fa-edit"></li>
                                    </a>
                                </td>

                                <td>
                                    <form method="POST" action="{{ url('carreras', [$row]) }}">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger">
                                            <li class="fa-solid fa-trash"></li>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    {{-- Modal de pruebas  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir carreras</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form class="text-center" id="frmCarreras" method="POST" action="{{ url('carreras') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <li class="fa-solid fa-graduation-cap"></li>
                            </span>
                            <input type="text" class="form-control" name="carrera" placeholder="Carrera" />
                        </div>
                        <button class="btn btn-success">
                            <li class="fa-solid fa-floppy-disk"> Guardar</li>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
