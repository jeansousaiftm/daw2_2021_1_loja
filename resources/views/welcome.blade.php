@extends("template.admin")

@section("content")
	
	@if (Auth::check())
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header ">
						<h5 class="card-title">Hello World!</h5>
					</div>
					<div class="card-body ">
						Hello World!
					</div>
				</div>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header ">
						<h5 class="card-title">Login</h5>
					</div>
					<div class="card-body">
						<form action="/login" method="POST" class="row">
							<div class="col-5 form-group">
								<label for="email">Email:</label>
								<input type="email" id="email" name="email" class="form-control" />
							</div>
							<div class="col-5 form-group">
								<label for="password">Senha:</label>
								<input type="password" id="password" name="password" class="form-control" />
							</div>
							<div class="ml-auto mr-auto">
								@csrf
								<button type="submit" class="btn btn-primary btn-round">OK</button>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	@endif
	
@endsection