
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(function() {
  window.setInterval(updateJobStatus, 10000);

	var jobStatus = $('body').find('.job_status');

  var autoFollowForm = $('body').find('#autofollow_form');
  var autoFollowFormSubmit = $(autoFollowForm).find('.button');

  var repoSpellCheckForm = $('body').find('#repospellcheck');
  var repoSpellCheckFormSubmit = $(repoSpellCheckForm).find('.button');

  $(autoFollowFormSubmit).on('click', function(e){
  	e.preventDefault();

  	$(autoFollowFormSubmit).addClass('disabled');

		axios.post('/start_autofollower', {
	    username: $(autoFollowForm).find('input[name="username"]').val()
	  })
	  .then(function (response) {
	    $(autoFollowForm).html('<div class="ui segment">Followers: '+ response.data.followers +'</div>')
	  })
  });

  $(repoSpellCheckFormSubmit).on('click', function(e){
  	e.preventDefault();

  	$(repoSpellCheckFormSubmit).addClass('disabled');

		axios.post('/start_spellchecker', {
	    username: $(repoSpellCheckForm).find('input[name="username"]').val(),
	    repo: $(repoSpellCheckForm).find('input[name="repo"]').val()
	  })
	  .then(function (response) {
	  	console.log(response.data);
	    $(repoSpellCheckForm).html(response.data.suggestions_html)
	  })
  });

	function updateJobStatus() {
		axios.get('/job_status')
	  .then(function (response) {
	  	$(jobStatus).find('.pending').html(response.data.pending_jobs);
	  	$(jobStatus).find('.failed').html(response.data.failed_jobs);
	  })
	}

	updateJobStatus()
});