<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Política</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="namepolitica">Nombre</label>
                <input wire:model="namepolitica" type="text" class="form-control" id="namepolitica" placeholder="Nombre">@error('namepolitica') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <input wire:model="description" type="text" class="form-control" id="description" placeholder="Description">@error('description') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="type_politic">Tipo de Politica:</label>
                <select wire:model="type_politic" class="form-control" name="type_politic" id="type_politic">
                    @foreach ($tipopoliticas as $tipopolitica)      
                    <option value="{{$tipopolitica->id}}"> {{ $tipopolitica->name }} </option>
                    @endforeach
                </select>@error('type_politic') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_statu">Estatus:</label>
                <select wire:model="id_statu" class="form-control" name="id_statu" id="id_statu">
                    @foreach ($status as $statu)      
                    <option value="{{$statu->id}}"> {{ $statu->name }} </option>
                    @endforeach
                </select>@error('id_statu') <span class="error text-danger">{{ $message }}</span> @enderror
{{--                  <input wire:model="id_statu" type="text" class="form-control" id="id_statu" placeholder="Id Statu">@error('id_statu') <span class="error text-danger">{{ $message }}</span> @enderror
  --}}            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input wire:model="autor" type="text" class="form-control" id="autor" placeholder="Autor">@error('autor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="imagePolitic">Imagen:</label>
                <input wire:model="imagePolitic" type="file" class="form-control" name="imagePolitic" id="imagePolitic" placeholder="Imagepolitic">@error('imagePolitic') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pdf">PDF:</label>
                <input wire:model="pdf" type="file" class="form-control" name="pdf" id="pdf" placeholder="Pdf">@error('pdf') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-success" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>