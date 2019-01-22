<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<link href="{{ asset('\css\bootstrap.min.css') }}" rel="stylesheet">
	
	<title></title>
</head>
<body>
	<div class="container">
		<div v-cloak>
			<div class="container">

				@if(count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<div class="row mt-5">
					<div col-6>
						<a href="{{ route('start') }}"><button class="btn btn-success btn-rounded">
							<i class="glyphicon glyphicon-plus icon-white" style="padding: 6px 6px;"></i>На стартовую страницу
						</button></a>
					</div>
				</div>

				<div class="row mt-5">
					<div class="col-9">
						<label style="font-family: sans-serif; font-size: 2vw;">Список направлений</label>
					</div>
				</div>

				<?php if($id_direction == 0) {?>

					<div class="row mt-5">
						<a href="{{ route('subjects', ['direct' => -1]) }}"><button class="btn btn-success btn-rounded">
							<i class="glyphicon glyphicon-plus icon-white" style="padding: 7px 6px;"></i>Новое направление
						</button></a>
					</div>
				<?php } ?>

				<?php if($id_direction == -1) {?>

					<form method="POST" action="{{ route('DirStore') }}">
							
						<div class="form-row mt-5">
							<div class="container">
								<div class="form-group">
									<div class="form-row"><label style="font-family: sans-serif; font-size: 1.5vw;">Новое направление</label></div>
									<div class="form-row">
										<div class="col-3">
											<label style="font-family: sans-serif; font-size: 1vw;">Направление</label>
											<input type="text" class="form-control" name="nameDir" id="nameDir" placeholder="Направление">
										</div>
									</div>
									<div class="form-row mt-5">
										<div class="col-7">
											<button type="submit" class="btn btn-primary btn">Сохранить</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						{{ csrf_field() }}
					</form>
				<?php } else if ($id_direction > 0) {?>
					<form method="POST" action="{{ route('DirEditStore', ['id_direction' => $id_direction]) }}">
							
						<div class="form-row mt-5">
							<div class="container">
								<div class="form-group">
									<div class="form-row"><label style="font-family: sans-serif; font-size: 1.5vw;">Редактировать направление</label></div>
									@foreach($directions as $direction)
										<div class="form-row">
											<div class="col-3">
												<label style="font-family: sans-serif; font-size: 1vw;">Направление</label>
												<input type="text" class="form-control" name="nameDir" id="nameDir" placeholder="Направление" value="{{ $direction->nameDir }}">
											</div>
										</div>
									@endforeach
									
									<div class="form-row mt-5">
										<div class="col-7">
											<button type="submit" class="btn btn-primary btn">Сохранить</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						{{ csrf_field() }}
					</form>
				<?php }?>




				<div class="row">
					<div class="col mt-5 border border-secondary rounded">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col" class="col-xs-2">Наименование направления</th>
									<th scope="col" class="col-xs-2">Опции</th>
								</tr>
							</thead>
							<tbody>
								@foreach($answer as $ans)
									<tr>
			      						<td scope="row">{{ $ans->nameDir }}</td>
			      						<td scope="row">		      						
			      							<a href="{{ route('subjects', ['direct' => $ans->direction_id]) }}"><button class="btn btn-warning btn-rounded btn-xs">Ред.</button></a>

			      							
			      							<form action="{{ route('directDelete', ['direct' => $ans->direction_id]) }}" method="post">
			      								<input type="hidden" name="_method" value="DELETE">
			      								<button type="submit" class="btn btn-danger btn-rounded btn-xs">Удалить</button>

			      								{{ csrf_field() }}
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
	</div>
</body>
</html>