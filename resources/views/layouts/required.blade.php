<div class="form-group">
	<div class="col-md-4"></div>
	<div class="col-md-6">
		<ul>
			@foreach($errors->all() as $error)
			<li>
				{{ $error }}
			</li>
			@endforeach
		</ul>
	</div> 
</div>