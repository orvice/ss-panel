<template>
  <div id="Post">
    <h1>{{title}}</h1>
    <div>
      <div v-for="post in posts" class="text item">
        <a href="#">{{post.title}}</a>
      </div>
    </div>
  </div>
</template>
<style>

</style>

<script>
/* eslint-disable no-new */
export default {
  name: 'Post',
  data () {
    return {
      title: 'Welcome to Your Vue.js App',
      posts: []
    }
  },
  mounted: function() {
    this.$http.get('http://x5.dev/api/blog', {}, {
        headers: {

        },
        emulateJSON: true
    }).then(function(response) {
      // 这里是处理正确的回调
        this.posts = response.data
        // this.articles = response.data["subjects"] 也可以

    }, function(response) {
        // 这里是处理错误的回调
        console.log(response)
    });
  }
}
</script>
