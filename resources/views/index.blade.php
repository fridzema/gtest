@extends('layouts.default')

@section('content')
	<div class="ui grid">
		<div class="stretched row">
			<div class="sixteen wide column">
				<profile></profile>
			</div>
			{{-- <div class="six wide column">
				<div class="ui segment yellow job_status">
					<div class="ui label ribbon yellow"><i class="icon tasks"></i>Jobs</div>
					<div class="ui basic segment center aligned green">
					  <div class="ui green statistic">
					    <div class="value pending">0</div>
					    <div class="label">
					      Pending
					    </div>
					  </div>
					</div>

					<div class="ui basic segment center aligned red">
					  <div class="ui red statistic">
					    <div class="value failed">0</div>
					    <div class="label">
					      Failed
					    </div>
					  </div>
					</div>
				</div>
			</div> --}}
		</div>
		<div class="stretched row">
      <div class="eight wide column">
        <social-tools></social-tools>
      </div>

      <div class="eight wide column">
       <spell-checker></spell-checker>
		  </div>
    </div>
	</div>
@endsection