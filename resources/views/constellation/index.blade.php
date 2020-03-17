@foreach($constellations as $constellation)
<table border="1">
	<tr>
		<td width=5%>{{ $constellation->today_date }}</td>
		<td width=5%>{{ $constellation->constellation_name }}</td>
		<td>{{ $constellation->overall_fortune }}</td>
		<td width=20%>{{ $constellation->overall_description }}</td>
		<td>{{ $constellation->love_fortune}}</td>
		<td width=15%>{{ $constellation->love_description }}</td>
		<td>{{ $constellation->work_fortune}}</td>
		<td width=10%>{{ $constellation->work_description }}</td>
		<td>{{ $constellation->future_fortune}}</td>
		<td width=10%>{{ $constellation->future_description }}</td>
	</tr>
</table>
@endforeach
