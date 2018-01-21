<div class="ui segment">
	<div class="ui segment">
		<h5 class="ui dividing header">Original text:</h5>
		<p>{!! $data['original_content'] !!}</p>
	</div>
	<div class="ui segment">
		<h5 class="ui dividing header">Suggestions:</h5>
		<ul class="ui list">
			@foreach($data['spellchecker']['corrections'] as $correctionname => $value)
				<li>{{$correctionname}}
					<ul>
					@foreach($value as $test)
						<li>{{$test}}</li>
					@endforeach
					</ul>
				</li>
			@endforeach
		</ul>
	</div>
</div>