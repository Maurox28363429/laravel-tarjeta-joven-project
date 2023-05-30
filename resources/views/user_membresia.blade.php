<style type="text/css">
	th,td{
		text-align:center;
	}
	table {
  border-collapse: collapse;
  width: 100%;
}
  
/* Apply a background color to odd numbered rows */
tr:nth-child(odd) {
  background-color: #f2f2f2;
}

/* Apply a different background color to even numbered rows */
tr:nth-child(even) {
  background-color: #ffffff;
}
</style>
<table style="width:100%;">
	<thead>
		<tr>
		  <th scope="row">#</th>
          <th scope="row">Img</th>
          <th scope="row">DNI</th>
          <th scope="row">Nombre</th>
          <th scope="row">Sexo</th>
          <th scope="row">Correo</th>
          <th>Nombre del Beneficiario</th>
          <th>Cedula del Beneficiario</th>
		</tr>
	</thead>
	<tbody>
		@foreach($user as $key => $value)
		<tr>
			<td>{{$value['id']}}</td>
			<td>
				<img src="{{$value['img_url'] ?? 'https://api.tarjetajovendiamante.com/no.jpg'}}" style="width:30px;height: auto;">
			</td>
			<td>
				<img src="{{$value['dni'] ?? 'https://api.tarjetajovendiamante.com/no.jpg'}}" style="width:100px;height: auto;">
			</td>
			<td>
				{{$value['name']}} {{$value['last_name']}}
			</td>
			<td>{{($value['sex'])? "Hombre":"Mujer"}}</td>
			<td>{{$value['email']}}</td>
			<td>{{$value['beneficiario_poliza_name']}}</td>
			<td>{{$value['beneficiario_poliza_cedula']}}</td>
		</tr>
		@endforeach
	</tbody>
</table>