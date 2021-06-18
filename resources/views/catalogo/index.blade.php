@extends("template.catalogo")

@section("content")
	
	
	<h1 class="title">
		Loja Online
		<br>
		<small>Veja todos os produtos disponíveis</small>
	</h1>
		
	<div class="row">

		<div class="col-6 form-group">
			
			@if ($produtos->currentPage() > 1)
				<a href="#" onclick="mudaPagina({{ $produtos->currentPage() - 1 }});" class="btn btn-primary">Anterior</a>
			@endif
			
			@if ($produtos->hasMorePages())
				<a href="#" onclick="mudaPagina({{ $produtos->currentPage() + 1 }});" class="btn btn-primary">Próximo</a>
			@endif
			
		</div>
		<div class="col-2"><label for="ordenacao">Ordenar por:</label></div>
		<div class="col-4 form-group">
			<form id="frmSelecao" method="POST" action="/catalogo">
				@csrf
				<input type="hidden" id="page" name="page" value="{{ $produtos->currentPage() }}" />
				<select id="ordenacao" name="ordenacao" class="form-control" onchange="$(this).parents('form').submit();">
					<option value="0" 
						@if ($ordenacao == "0")
							selected="selected"
						@endif
					>Nenhum</option>
					<option value="1"
						@if ($ordenacao == "1")
							selected="selected"
						@endif
					>Alfabética</option>
					<option value="2"
						@if ($ordenacao == "2")
							selected="selected"
						@endif
					>Menor Preço</option>
					<option value="3"
						@if ($ordenacao == "3")
							selected="selected"
						@endif
					>Maior Preço</option>
				</select>
			</form>
		</div>
		
			
		@foreach ($produtos as $produto)
	
			<div class="col-4">
				<div class="card-container manual-flip">
					<div class="card">
						<div class="front">
							<div class="cover">
								<img src="{{ asset('storage/' . $produto->foto) }}"/>
							</div>
							<div class="content">
								<div class="main">
									<h3 class="name">{{ $produto->nome }}</h3>
									<p class="profession">{{ str_replace(".", ",", str_replace(",", "", number_format($produto->valor, 2))) }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		@endforeach

	</div>
	
	<script>
		function mudaPagina(pagina) {
			$("#page").val(pagina);
			$("#frmSelecao").submit();
		}
	</script>
	
@endsection