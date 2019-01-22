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
			<div class="row mt-5"></div>
			<div class="row mt-5">
					<div col-6>
						<a href="{{ route('start') }}"><button class="btn btn-success btn-rounded">
							<i class="glyphicon glyphicon-plus icon-white" style="padding: 6px 6px;"></i>На стартовую страницу
						</button></a>
					</div>
			</div>
			<div class="row mt-5">
				<div class="col-4"></div>
				<div class = "col-6">
					<a href="{{ route('mainInfo') }}"> <button class="btn btn-primary btn-rounded mt-5" >
		                <i class="glyphicon glyphicon-list-alt icon-white" style="padding: 7px 6px;"></i>Основная информация
		            </button></a>
		        </div>
		    </div>
		    <div class="row">
		    	<div class="col-4"></div>
		        <div class = "col-6">
					<a href="{{ route('additional', ['entant' => 0]) }}"> <button class="btn btn-primary btn-rounded mt-5">
						<i class="glyphicon glyphicon-plus icon-white" style="padding: 7px 6px;"></i>Дополнительная информация
					</button></a>
				</div>
			</div>
			<div class="row">
		    	<div class="col-4"></div>
		        <div class = "col-6">
					<a href="{{ route('subjectEntants', ['entant' => 0]) }}"> <button class="btn btn-primary btn-rounded mt-5">
						<i class="glyphicon glyphicon-plus icon-white" style="padding: 7px 6px;"></i>По направлениям
					</button></a>
				</div>
			</div>
			
		</div>
	</div>
	
</body>
</html>