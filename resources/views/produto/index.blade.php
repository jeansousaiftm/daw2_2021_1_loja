@extends("template.admin")

@section("content")
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header ">
					<h5 class="card-title">Cadastrar Produto</h5>
				</div>
				<div class="card-body">
					<form action="/produto" method="POST" class="row" enctype="multipart/form-data">
						<div class="col-8 form-group">
							<label for="nome">Nome:</label>
							<input type="text" id="nome" name="nome" class="form-control" value="{{ $produto->nome }}" />
						</div>
						<div class="col-4 form-group">
							<label for="valor">Valor (R$):</label>
							<input type="text" id="valor" name="valor" class="form-control" value='{{ str_replace(".", ",", str_replace(",", "", number_format($produto->valor, 2))) }}' />
						</div>
						<div class="col-12 form-group">
							<label for="foto">Foto:</label>
							<div class="custom-file">
								<input type="file" id="foto" name="foto" class="custom-file-input" />
								<label class="custom-file-label" for="foto">Selecionar Arquivo</label>
							</div>
						</div>
						<div class="ml-auto mr-auto">
							@csrf
							<input type="hidden" name="id" value="{{ $produto->id }}" />
							<button type="submit" class="btn btn-primary btn-round">Salvar</button>
						</div>
					</form>
				</div>
			</div>
			
			<div class="card">
				<div class="card-header ">
					<h5 class="card-title">Listagem</h5>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<colgroup>
							<col width="500" />
							<col width="500" />
							<col width="350" />
							<col width="200" />
							<col width="200" />
						</colgroup>
						<thead>
							<tr>
								<th></th>
								<th>Produto</th>
								<th>Valor</th>
								<th>Edit</th>
								<th>Del</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($produtos as $produto)
								<tr>
									<td>
										<img src="{{ asset('storage/' . $produto->foto) }}" width="300" />
									</td>
									<td>{{ $produto->nome }}</td>
									<td>{{ str_replace(".", ",", str_replace(",", "", number_format($produto->valor, 2))) }}</td>
									<td>
										<a href="/produto/{{ $produto->id }}/edit" class="btn btn-warning btn-round">Editar</a>
									</td>
									<td>
										<form action="/produto/{{ $produto->id }}" method="POST">
											<input type="hidden" name="_method" value="DELETE" />
											@csrf
											<button type="submit" class="btn btn-danger btn-round">Excluir</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>
	
	<script>
		
		$(document).ready(function() {
				
			$('#valor').mask('#.##0,00', {reverse: true});
			$('.div_valor').mask('#.##0,00', {reverse: true});
				
		});
		
	</script>
	
@endsection