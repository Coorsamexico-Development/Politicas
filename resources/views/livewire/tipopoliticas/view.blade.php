@section('title', __('Tipopoliticas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class=" far fa-folder text-info"></i>
							Lista de Tipos de Políticas</h4>
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
						<i class="fa fa-plus"></i> Agregar
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.tipopoliticas.create')
						@include('livewire.tipopoliticas.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
							{{--  	<th>Status</th>  --}}
								<th>ACCIONES</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tipopoliticas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								{{--  <td>{{ $row->status }}</td>  --}}
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Deseas borrar el tipo de politica {{$row->name}}? \n¡Los Tipos de politicas eliminadas no se pueden recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Borrar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $tipopoliticas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>