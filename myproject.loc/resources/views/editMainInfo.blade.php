<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />

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


				<div>
					<div class="row mt-5">
							<label style="font-family: sans-serif; font-size: 2vw;">Редактирование главной информации об абитуриенте</label>
					</div>

					<form method="POST" action="{{ route('entantEditStore', ['id_entant' => $id_entant]) }}">
					
						<div class="form-row mt-5">
							<div class="container">
								<div class="form-group">
			
									<div class="form-row"><label style="font-family: sans-serif; font-size: 1.1vw;">Оcновная информация</label></div>

										@foreach($main_entant as $entant)
											<div class="form-row">
												<div class="col-4">
													<label style="font-family: sans-serif; font-size: 1vw;">Имя</label>
													<input type="text" class="form-control" name="name" id="name" placeholder="Имя" value = "{{ $entant->name }}">
												</div>
												<div class="col-4">
													<label style="font-family: sans-serif; font-size: 1vw;">Отчество</label>
													<input type="text" class="form-control" name="secondname" id="secondname" placeholder="Отчество" value = "{{ $entant->secondname }}">
												</div>
												<div class="col-4">
													<label style="font-family: sans-serif; font-size: 1vw;">Фамилия</label>
													<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Фамилия" value="{{ $entant->lastname }}">
												</div>
											</div>
											<div class="form-row mt-3">
												<div class="col-4">
													<label style="font-family: sans-serif; font-size: 1vw;">Дата рождения</label></br>
													<input type="date" name="dbirth" id="dbirth" value="{{ $entant->dbirth }}">
												</div>
												<div class="col-4">
													<label style="font-family: sans-serif; font-size: 1vw;">Пол</label>
													<select class="form-control form-control" name="danger" id="danger">
														<?php if ($entant->danger == 'M') { ?>
												  			<option>F</option>
												  			<option selected>M</option>
												  		<?php } else { ?>
												  			<option selected>F</option>
												  			<option>M</option>
												  		<?php } ?>
											  		</select>
												</div>
											</div>

										@endforeach
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
				</div>
				
			



				<div class="row mt-5">
					<div class="col">
						<label style="font-family: sans-serif; font-size: 2vw;">Абитуриенты</label>
					</div>
				</div>



				<div class="row">
					<div class="col mt-5 border border-secondary rounded">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col" class="col-xs-1">id</th>
									<th scope="col" class="col-xs-2">Имя</th>
									<th scope="col" class="col-xs-2">Отчество</th>
									<th scope="col" class="col-xs-2">Фамилия</th>
									<th scope="col" class="col-xs-2">День рождения</th>
									<th scope="col" class="col-xs-2">Пол</th>
									<th scope="col" class="col-xs-2">Опции</th>
								</tr>
							</thead>
							<tbody>

								@foreach($answer as $ans)
									<tr>
			      						<td scope="row">{{ $ans->entant_id }}</td>
			      						<td scope="row">{{ $ans->name }}</td>
			      						<td scope="row">{{ $ans->secondname }}</td>
			      						<td scope="row">{{ $ans->lastname }}</td>
			      						<td scope="row">{{ $ans->dbirth }}</td>
			      						<td scope="row">{{ $ans->danger }}</td>
			      						<td>		      						
			      							<a href="{{ route('editMainEntant', ['entant' => $ans->entant_id]) }}"><button class="btn btn-warning btn-rounded btn-xs">Ред.</button></a>

			      							<form action="{{ route('entantDelete', ['entant' => $ans->entant_id]) }}" method="post">
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