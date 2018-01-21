@extends('layouts.default')

@section('content')
	<h1 class="ui header"><i class="icon github"></i>Github toolbox</h1>

	<div class="ui grid">
		<div class="stretched row">
			<div class="ten wide column">
				<div class="ui segment">
					<div class="ui label ribbon green"><i class="icon tasks"></i>Profile</div>
					<br /><br />
					<div class="ui grid">
						<div class="four wide column">
							<img src="{{ $profile['avatar_url'] }}" class="ui medium circular image" />
						</div>
						<div class="three wide column">
							<h5 class="ui dividing header">Name</h5>
							<p>{{ $profile['name'] }}</p>
							<h5 class="ui dividing header">Company</h5>
							<p>{{ $profile['company'] }}</p>
							<h5 class="ui dividing header">Location</h5>
							<p>{{ $profile['location'] }}</p>
						</div>
						<div class="three wide column">
							<h5 class="ui dividing header">Bio</h5>
							<p>{!! $profile['bio'] !!}</p>
							<h5 class="ui dividing header">Hireable</h5>
							<p>@if($profile['hireable']) <i class="icon checkmark"></i> Yes @else <i class="icon remove"></i> No @endif</p>
							<h5 class="ui dividing header">Email</h5>
							<p>{{ $profile['email'] }}</p>
						</div>
						<div class="six wide center aligned column">
							<div class="ui statistic">
							  <div class="value">
							    {{$profile['public_repos']}}
							  </div>
							  <div class="label">
							    Repositories
							  </div>
							</div>
							<div class="ui statistic">
							  <div class="value">
							    {{$profile['public_gists']}}
							  </div>
							  <div class="label">
							    Gists
							  </div>
							</div>
							<div class="ui statistic">
							  <div class="value">
							    {{$profile['followers']}}
							  </div>
							  <div class="label">
							    Followers
							  </div>
							</div>
							<div class="ui statistic">
							  <div class="value">
							    {{$profile['following']}}
							  </div>
							  <div class="label">
							    Following
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="six wide column">
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
			</div>
		</div>
		<div class="stretched row">
			<div class="eight wide column">
				<form class="ui form raised segment blue" id="autofollow_form">
					<div class="ui label ribbon blue"><i class="icon wizard"></i>Automatic follow user followers</div>
					<br /><br />
					<div class="field">
						<label>Username</label>
						<input type="text" name="username" placeholder="Username" />
					</div>

					<button type="submit" class="ui button">Submit</button>
				</form>
			</div>

			<div class="eight wide column">
				@if(empty(env('SPELLCHECK_KEY')))
					<div class="ui message warning icon"><i class="icon warning"></i>
						<div class="content">
							<div class="header">Fill your spellcheck api key in .env file!</div>
							<p>Get your key <a href="https://market.mashape.com" target="_blank">here</a></p>
						</div>
					</div>
				@endif
				<form class="ui form raised orange segment @if(empty(env('SPELLCHECK_KEY'))) disabled @endif" id="repospellcheck">
					<div class="ui label ribbon orange"><i class="icon translate"></i>Repository spellchecker</div>
					<br /><br />

					<div class="field">
						<label>Username</label>
						<input type="text" name="username" placeholder="Username" value="fridzema" />
					</div>

					<div class="field">
						<label>Repository name</label>
						<input type="text" name="repo" placeholder="Repository" value="test_spell" />
					</div>

					<button type="submit" class="ui button @if(empty(env('SPELLCHECK_KEY'))) disabled @endif">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection