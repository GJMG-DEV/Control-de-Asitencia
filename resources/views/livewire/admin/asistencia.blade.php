<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <div class="mb-3">
            <label for="" class="form-label">Seleccionar Seccion</label>
            <select class="form-select form-select-lg"name="" id="" wire:model.live="selectSesion">
                <option selected>Seleccionar una seccion</option>
                @foreach ($dataSesion as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary" wire:click="registrarAsistencia">
            Guardar Asistencia
        </button>
    </div>

    <div class="card-footer text-muted">
        <div class="table-responsive">
            @if (!empty($dataAlumno))
                <table id="datatable" class="table table-striped" data-toggle="data-table"
                    wire:key="{{ $selectSesion }}">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Alumno</th>
                            <th scope="col">Asistencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataAlumno as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->apePaterno }} {{ $item->apeMaterno }}, {{ $item->nombre }}</td>
                                <td>
                                    <input class="form-check-input" value="{{ $item->id }}" type="checkbox"
                                        wire:model="asistencias.{{ $item->id }}" />
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            @endif

        </div>

    </div>


</div>
