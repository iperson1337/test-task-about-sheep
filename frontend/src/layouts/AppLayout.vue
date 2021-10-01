<template>
  <the-header></the-header>
  <div class="container mt-5">
    <router-view></router-view>
  </div>
</template>

<script>
import TheHeader from "../components/TheHeader";

export default {
  name: "AppLayout",
  components: {
    TheHeader
  }
}
</script>

<style lang="scss">
@import "../assets/sass/app.scss";
</style>
