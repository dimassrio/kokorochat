@extends('_layout.single')

@section('body')
	<div class="row">
		<div class="col-lg-12">
			<table class="table">
				<tbody>
				@foreach($user as $u)
					<tr>
						<td><a href="{{{url('users')}}}/{{{$u->id}}}/chat">{{{$u->username}}}</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop