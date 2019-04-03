<template>
<!--   @if(empty(env('SPELLCHECK_KEY')))
    <div class="ui message warning icon"><i class="icon warning"></i>
      <div class="content">
        <div class="header">Fill your spellcheck api key in .env file!</div>
        <p>Get your key <a href="https://market.mashape.com" target="_blank">here</a></p>
      </div>
    </div>
  @endif -->
  <form class="ui form raised orange segment">
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

    <button type="submit" class="ui button">Submit</button>
  </form>
</template>

<script>
  export default {
      data () {
        return {

        }
      },
     methods: {
        fetch() {

        }
      },
      mounted() {
        // this.fetch()
      }
  }
</script>