<!DOCTYPE html>
<html lang="en">
<head>
	<title>ROBOT SIMULATION - MARL RICANOR</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="container">

		<div class="row">
			<div class="col-md-2">
			</div>

			<div class="col-md-8">

				<h1>ROBOT SIMULATION - MARL RICANOR</h1>
			
				<form action="{{ route('simulate') }}" method="POST"> 
					@csrf	
					<div class="form-group">
						<label for="usr">Command:</label>
						<div class="row">
							<div class="col-md-9">
								<input type="text" class="form-control" name="command">
							</div>
							<div class="col-md-3">
								<button type="submit" class="btn btn-primary">Execute</button>
							</div>
						</div>
					</div>
				</form>

				<div class="form-group">
					<label for="usr">Terminal:</label>
					<div class="row">
						<div class="col-md-9">
							<textarea class="form-control" rows="20" readonly>
								@if(!empty(Session::get('logs')))
									@foreach(Session::get('logs') as $log)
										{{$log}}
									@endforeach
								@endif
							</textarea>
						</div>
						<div class="col-md-3">
							<form method="POST" action="{{ route('resetSession') }}">
								@csrf
								<button type="submit" class="btn btn-warning">Resest Session</button>
							</form>
						</div>
					</div>
				</div>
				
			</div>

			<div class="col-md-2">
			</div>
		</div>
	</div>
</body>
</html>