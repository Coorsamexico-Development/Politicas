<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Finiquito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="apellidop">Apellido Paterno:</label>
                <input wire:model="apellidop" type="text" class="form-control" id="apellidop" placeholder="Apellidop">@error('apellidop') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="apellidom">Apellido Materno:</label>
                <input wire:model="apellidom" type="text" class="form-control" id="apellidom" placeholder="Apellidom">@error('apellidom') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de Baja:</label>
                <input wire:model="fechaBaja" type="date" class="form-control" id="fechaBaja" placeholder="Fecha de Baja">@error('fechaBaja') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de Finiquito:</label>
                <input wire:model="fecha" type="date" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
           {{-- <div class="form-group">
                <label for="ejercido"></label>
                <input wire:model="ejercido" type="date" class="form-control" id="ejercido" placeholder="Ejercido">@error('ejercido') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> --}}

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-success" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>