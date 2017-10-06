<template>
  <div id="app">
    <div class="wrap">
      <nav-panel v-bind:current-page="$route.path" v-bind:documents="documents"></nav-panel>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: 'app',
  data () {
    return {
      documents: [
        {
          id: 1,
          name: 'Document 1',
          content: 'Some content... Some content... Some content...'
        }
      ]
    }
  }
}

</script>

<style>
  body {
    margin: 0;
    overflow: hidden;
  }
</style>

<style lang="scss" scoped>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;

  .wrap {
    display: flex;
    width: 100%;
  }
}
</style>
