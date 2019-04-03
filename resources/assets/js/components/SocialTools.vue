<template>
  <form class="ui form raised segment blue">
    <div class="ui label ribbon blue"><i class="icon wizard"></i>Automatic follow user followers</div>
    <br /><br />
    <div class="field">
      <label>Username</label>
      <input type="text" name="username" placeholder="Username" />
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

        },
      },
      mounted() {
        // this.fetch()
      }
  }
</script>