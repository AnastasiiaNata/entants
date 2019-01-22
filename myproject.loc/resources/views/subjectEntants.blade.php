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
				<form method="POST" action="{{ route('SubEditStore', ['id_entant' => $id_entant, 'lenNameS' => $lenNameS]) }}">
							
						<div class="form-row mt-5">
							<div class="container">
								<div class="form-group">
									<div class="form-row"><label style="font-family: sans-serif; font-size: 1.5vw;">Редактировать направление для {{ $nameS['name'] }} {{ $nameS['lastname'] }}</label></div>
										<div class="form-row">
											<div class="col-3">
												<label style="font-family: sans-serif; font-size: 1vw;">Направление</label></br>
												@foreach($subjects as $sub)
													<?php if(array_key_exists($sub->direction_id, $nameS)) {?>
														<input type="checkbox" name="nameDir[]" value="{{ $sub->direction_id }}" id="nameDir" checked>{{ $sub->nameDir }}</br>
													<?php } else {?>
														<input type="checkbox" name="nameDir[]" value="{{ $sub->direction_id }}" id="nameDir">{{ $sub->nameDir }}</br>
													<?php }?>
												@endforeach
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
				<?php } ?>



				<div class="row">
					<div class="col mt-5 border border-secondary rounded">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col" class="col-xs-2">Имя</th>
									<th scope="col" class="col-xs-2">Фамилия</th>
									<th scope="col" class="col-xs-2">Направление</th>
									<th scope="col" class="col-xs-2">Опции</th>
								</tr>
							</thead>
							<tbody>
								@foreach($answer as $ans)
								
									<tr>
			      						<td scope="row">{{ $ans->name }}</td>
			      						<td scope="row">{{ $ans->lastname }}</td>
			      						<td scope="row">{{ $ans->nameDir }}</td>
			      						<td>		      						
			      							<a href="{{ route('subjectEntants', ['entant' => $ans->entant_id]) }}"><button class="btn btn-warning btn-rounded btn-xs">Ред.</button></a>

			      							<form action="{{ route('entantDelete', ['entant' => $ans->id]) }}" method="post">
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