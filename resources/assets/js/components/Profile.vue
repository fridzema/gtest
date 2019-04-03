<template>
<div class="ui segment" v-if="profile">
  <div class="ui label ribbon blue image"><img :src="profile.avatar_url" class="ui right spaced avatar image" /> {{profile.login}}</div>
  <br /><br />
  <div class="ui grid">
    <div class="five wide column">
      <h5 class="ui dividing header">Name</h5>
      <p>{{ profile.name }}</p>
      <h5 class="ui dividing header">Company</h5>
      <p>{{ profile.company }}</p>
      <h5 class="ui dividing header">Location</h5>
      <p>{{ profile.location }}</p>
    </div>
    <div class="five wide column">
      <h5 class="ui dividing header">Bio</h5>
      <p v-html="profile.bio"></p>
      <h5 class="ui dividing header">Hireable</h5>
      <p>
        <i v-if="profile.hireable" class="icon checkmark"></i>
        <i v-if="!profile.hireable" class="icon remove"></i>
      </p>
      <h5 class="ui dividing header">Email</h5>
      <p>{{ profile.email }}</p>
    </div>
    <div class="six wide center aligned column">
      <div class="ui statistic">
        <div class="value">
          {{profile.public_repos}}
        </div>
        <div class="label">
          Repositories
        </div>
      </div>
      <div class="ui statistic">
        <div class="value">
          {{profile.public_gists}}
        </div>
        <div class="label">
          Gists
        </div>
      </div>
      <br />
      <div class="ui statistic">
        <div class="value">
          {{profile.followers}}
        </div>
        <div class="label">
          Followers
        </div>
      </div>
      <div class="ui statistic">
        <div class="value">
          {{profile.following}}
        </div>
        <div class="label">
          Following
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
  // import Event from '../event.js';
    export default {
        data () {
          return {
            profile: null
          }
        },
       methods: {
          fetch() {
            this.fetchProfileData();

            this.intervalid1 = setInterval(function(){
              this.fetchProfileData();
            }.bind(this), 3000);
          },
          fetchProfileData() {
            axios
            .get('/profile_data')
            .then(response => (this.profile = response.data))
          }
        },
        mounted() {
          this.fetch()
        }
    }
</script>