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
                            <th>Alumnno</th>
                            <th>Correo</th>
                            <th>Carrera</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        {{-- sacar informacion de la base de datos --}}
                        @php $i = 1 @endphp
                        @foreach ($alumnos as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $row->nombre }}</td>
                                <td>{{ $row->correo }}</td>
                                <td>{{ $row->carrera }}</td>

                                <td>
                                    <a href="{{ url('alumnos', [$row]) }}" class="btn btn-warning">
                                        <li class="fa-solid fa-edit"></li>
                                    </a>
                                </td>

                                <td>
                                    <form method="POST" action="{{ url('alumnos', [$row]) }}">
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

    {{-- Modal para inscribir un alumno.  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Alumno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form class="text-center" id="frmAlumnos" method="POST" action="{{ url('alumnos') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <li class="fa-solid fa-user"></li>
                            </span>
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" />
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <li class="fa-solid fa-at"></li>
                            </span>
                            <input type="email" class="form-control" name="correo" placeholder="Correo Electronico" />
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <li class="fa-solid fa-graduation-cap"></li>
                            </span>
                            <select class="form-select" name="id_carrera" required>
                                <option value="">Carreras</option>
                                @foreach ($carreras as $row)
                                    <option value="{{ $row->id }}">{{ $row->carrera }}</option>
                                @endforeach
                            </select>
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
