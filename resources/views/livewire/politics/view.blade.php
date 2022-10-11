@section('title', __('Politics'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="far fa-bookmark text-info"></i>
							Lista de Políticas</h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ date("Y-m-d") }}</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Agregar
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.politics.create')
						@include('livewire.politics.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Tipo de política</th>
								<th>Estatus</th>
								<th>Autor</th>
								<th>Imagen</th>
								<th>Pdf</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($politics as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->namepolitica }}</td>
								<td>{{ $row->description }}</td>
								<td>{{ $row->type_politic }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->autor }}</td>
								<td>
									<a  href="{{ $row->imagePolitic }}"
  data-fancybox="gallery"
  data-caption="{{ $row->namepolitica }}"
>
<i class="fas fa-images"></i>
</a>
									</td>
								<td>
									@if (strpos(($row->pdf),".pdf") == true ) 
									<a  href="{{ $row->pdf }}"
										data-fancybox="gallery"
										data-caption="{{ $row->namepolitica }}"
									  >
									  <i class="fas fa-file-pdf"></i>
									  <p>es pdf</p>
									</a>
									@endif

									@if (strpos(($row->pdf),".pptx") == true ) 
									<a  href="{{ $row->pdf }}"
										data-fancybox="gallery"
										data-caption="{{ $row->namepolitica }}"
									  >
									  <i class="fas fa-file-pdf"></i>
									  <p>es pptx</p>
									</a>
									@endif

									@if (strpos(($row->pdf),"mkv") == true )
									<a style="color: chocolate" data-toggle="modal" data-target="#modalVideo">
									  <i class="fas fa-file-video"></i>
									  <p>es pdf</p>
									</a>
									<!-- Modal -->
                                      <div wire:ignore.self class="modal fade" id="modalVideo" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Watch Video</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true close-btn">×</span>
                                                      </button>
                                                  </div>
                                                 <div class="modal-body">
                                      				 <p>{{ $row->pdf }}</p>
													   
													   <video width="320" height="240" controls>
														<source src="{{$row->pdf}}">
														Your browser does not support the video tag.
													  </video>
													 
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                                                      <button type="button" wire:click.prevent="store()" class="btn btn-success close-modal">Guardar</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
									@endif
									
									  </td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Deseas borrar la politica {{$row->namepolitica}}? \nLas políticas borradas nos se pueden recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Borrar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $politics->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

