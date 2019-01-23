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
				<div class="row mt-5">
					<div class="col">
						<label style="font-family: sans-serif; font-size: 2vw;">Абитуриенты</label>
					</div>
				</div>

				<div class="row mt-5">
					<div col-6>
						<a href="{{ route('showEntants') }}"><button class="btn btn-success btn-rounded">
							<i class="glyphicon glyphicon-plus icon-white" style="padding: 6px 6px;"></i>Назад
						</button></a>
					</div>
					<div col-6>
						<a href="{{ route('createEntant') }}"><button class="btn btn-success btn-rounded ml-5">
							<i class="glyphicon glyphicon-plus icon-white" style="padding: 6px 6px;"></i>Новый абитуриент
						</button></a>
					</div>
				</div>


		
				<div class="row">
					<div class="col mt-5 border border-secondary rounded">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
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
			      						<td scope="row">{{ $ans->name }}</td>
			      						<td scope="row">{{ $ans->secondname }}</td>
			      						<td scope="row">{{ $ans->lastname }}</td>
			      						<td scope="row">{{ $ans->dbirth }}</td>
			      						<td scope="row">{{ $ans->danger }}</td>
			      						<td>		      						
			      							<a href="#"><button class="btn btn-warning btn-rounded btn-xs">Ред.</button></a>

			      							<form action="#" method="post">
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