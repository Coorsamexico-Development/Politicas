@section('title', __('Finiquitos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="far fa-handshake text-info"></i>
							Lista de Finiquitos  </h4>
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
						@include('livewire.finiquitos.create')
						@include('livewire.finiquitos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Apellido Paterno</th>
								<th>Apellido Materno</th>
								<th>Fecha de Baja</th>
								<th>Fecha de Finiquito</th>
								<th>Ejercido</th>
								<th>ACCIONES</th>
							</tr>
						</thead>
						<tbody>
							@foreach($finiquitos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->apellidop }}</td>
								<td>{{ $row->apellidom }}</td>
								<td>{{ $row->fechaBaja }}</td>
								<td>{{ $row->fecha }}</td>
								<td><label class="switch">
									<input wire:change="UpdateEjercido({{ $row->id }},$event.target.checked)" data-id="{{ $row->id }}" value="1" class="mi_checkbox" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-onstyle="Active" data-offstyle="InActive"
									{{ $row->ejercido ? 'checked' : '' }}>
									<span class="slider round"></span>
									</label></td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Deseas borrar el finiquito {{$row->id}}? \nLos finiquitos borrados nos se pueden recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Borrar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $finiquitos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
