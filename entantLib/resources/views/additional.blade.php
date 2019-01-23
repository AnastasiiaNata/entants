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

				<div class="row mt-5">
					<div col-6>
						<a href="{{ route('showEntants') }}"><button class="btn btn-success btn-rounded">
							<i class="glyphicon glyphicon-plus icon-white" style="padding: 6px 6px;"></i>Назад
						</button></a>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-9">
						<label style="font-family: sans-serif; font-size: 2vw;">Абитуриенты</label>
					</div>
				</div>



				<?php if($id_entant > 0) { ?>
					<form method="POST" action="{{ route('entantEditAddiStore', ['id_entant' => $id_entant]) }}">
						
						<div class="form-row">
							<div class="container">
								<div class="form-group">

									<div class="form-row mt-5"><label style="font-family: sans-serif; font-size: 1.1vw;">Дополнительная информация</label>
									</div>
									@foreach($addiArr as $addi)
									<div class="form-row">
										<div class="col-3">
											<label style="font-family: sans-serif; font-size: 1vw;">Страна</label>
											<input type="text" class="form-control" name="country" id="country" placeholder="Страна" value="{{ $addi->country }}">
										</div>
										<div class="col-3">
											<label style="font-family: sans-serif; font-size: 1vw;">Город</label>
											<input type="text" class="form-control" name="city" id="city" placeholder="Город" value="{{ $addi->city }}">
										</div>
										<div class="col-3">
											<label style="font-family: sans-serif; font-size: 1vw;">Телефон</label>
											<input type="text" class="form-control" name="phone" id="phone" placeholder="Телефон" value="{{ $addi->phone }}">
										</div>
										<div class="col-3">
											<label style="font-family: sans-serif; font-size: 1vw;">E-mail</label>
											<input type="text" class="form-control" name="email" id="email" placeholder="E-mail"
											value="{{ $addi->email }}">
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
				

				<?php } ?>


				<div class="row">
					<div class="col mt-5 border border-secondary rounded">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col" class="col-xs-2">Имя</th>
									<th scope="col" class="col-xs-2">Фамилия</th>
									<th scope="col" class="col-xs-2">Страна</th>
									<th scope="col" class="col-xs-2">Город</th>
									<th scope="col" class="col-xs-2">Телефон</th>
									<th scope="col" class="col-xs-2">E-mail</th>
									<th scope="col" class="col-xs-2">Опции</th>
								</tr>
							</thead>
							<tbody>
								@foreach($answer as $ans)
									<tr>
			      						<td scope="row">{{ $ans->name }}</td>
			      						<td scope="row">{{ $ans->lastname }}</td>
			      						<td scope="row">{{ $ans->country }}</td>
			      						<td scope="row">{{ $ans->city }}</td>
			      						<td scope="row">{{ $ans->phone }}</td>
			      						<td scope="row">{{ $ans->email }}</td>
			      						<td>		      						
			      							<a href="{{ route('additional', ['entant' => $ans->entant_id]) }}"><button class="btn btn-warning btn-rounded btn-xs">Ред.</button></a>

			      							<form action="{{ route('entantDelete', ['entant' => $ans->entant_id]) }}" method="post">
			      								<input type="hidden" name="_method" value="DELETE">
			      								<button type="submit" class="btn btn-danger btn-rounded btn-xs">Удалить</button>

			      								{{ csrf_field() }}
			      							</form>
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