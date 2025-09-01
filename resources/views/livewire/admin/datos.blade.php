<div class="card shadow-lg border-0 rounded-4 container">
  <div class="card-header bg-gradient text-white rounded-top-4" style="background: linear-gradient(135deg, #0062E6, #33AEFF);">
    <h5 class="mb-0 fw-bold">Registrar Institución Educativa</h5>
  </div>
  <div class="card-body p-4">
    <form>
      <div class="row g-3">
        <!-- Nombre de la I.E -->
        <div class="col-md-12">
          <label class="form-label fw-semibold">Nombre de la I.E <span class="text-danger">*</span></label>
          <input type="text" class="form-control form-control-lg rounded-3 shadow-sm" required wire:model="nombre" placeholder="Ej. I.E San Clemente">
        </div>

        <!-- Nombre del Director -->
        <div class="col-md-6">
          <label class="form-label fw-semibold">Nombre del Director <span class="text-danger">*</span></label>
          <input type="text" class="form-control form-control-lg rounded-3 shadow-sm" required wire:model="director" placeholder="Ej. Juan Pérez">
        </div>

        <!-- Hora de Ingreso -->
        <div class="col-md-6">
          <label class="form-label fw-semibold">Hora de Ingreso <span class="text-danger">*</span></label>
          <input type="time" class="form-control form-control-lg rounded-3 shadow-sm" required wire:model="ingreso">
        </div>

        <!-- Botón -->
        <div class="col-md-12 text-end mt-3">
          <button type="button" wire:click="guardarDatos" class="btn btn-lg px-4 shadow-sm text-white" style="background: linear-gradient(135deg, #28a745, #5cd65c); border: none; border-radius: 12px;">
            Registrar
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@script
    <script>
        $js('eliminar', (id) => {

            Swal.fire({
                title: "Estas seguro de Elimar esta Seccion",
                text: "Recuerde que una vez eliminado ya no existirà mas este registro.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar"
            }).then((result) => {
                if (result.isConfirmed) {
                    $wire.dispatch('eliminarSesion', {
                        id: id
                    });

                }
            });
        })
    </script>
@endscript
