@extends('plantilla')

@section('contenido')
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card-header bg-dark text-white">Editar Alumnos</div>
            <div class="card-body">
                {{-- formulario --}}
                <form class="text-center" method="POST" action="{{ url('alumnos', [$alumno]) }}">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <li class="fa-solid fa-user"></li>
                        </span>
                        <input type="text" value="{{ $alumno->nombre }}" value="" class="form-control"
                            name="nombre" placeholder="Nombre" />
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <li class="fa-solid fa-at"></li>
                        </span>
                        <input type="email" value="{{ $alumno->correo }}" class="form-control" name="correo"
                            placeholder="Correo Electronico" />
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <li class="fa-solid fa-graduation-cap"></li>
                        </span>
                        <select class="form-select" name="id_carrera" required>
                            <option value="">Carreras</option>
                            @foreach ($carreras as $row)
                                @if ($row->id == $alumno->id_carrera)
                                    <option selected value="{{ $row->id }}">{{ $row->carrera }}</option>
                                @else
                                    <option value="{{ $row->id }}">{{ $row->carrera }}</option>
                                @endif
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
@endsection
