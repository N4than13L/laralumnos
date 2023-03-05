@extends('plantilla')

@section('contenido')
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card-header bg-dark text-white">Editar carreras</div>
            <div class="card-body">
                {{-- formulario --}}
                <form class="text-center" method="POST" action="{{ url('carreras', [$carrera]) }}">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <li class="fa-solid fa-graduation-cap"></li>
                        </span>
                        <input type="text" value="{{ $carrera->carrera }}" class="form-control" name="carrera"
                            placeholder="Carrera" />
                    </div>
                    <button class="btn btn-success">
                        <li class="fa-solid fa-floppy-disk"> Guardar</li>
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection
