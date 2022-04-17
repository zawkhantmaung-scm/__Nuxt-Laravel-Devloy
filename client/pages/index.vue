<template>
  <div class="container">
    <h1 class="title">{{ friday.program }}</h1>
  </div>
</template>

<script>
export default {
  async asyncData({ $axios }) {
    const response = await $axios.get('api/v1/friday')
    return { friday: await response.data }
  },
}
</script>

<style>
.container {
  margin: 0 auto;
  min-height: 90vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}
.title {
  font-family: 'Quicksand', 'Source Sans Pro', -apple-system, BlinkMacSystemFont,
    'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: rgb(255, 29, 29);
  letter-spacing: 1px;
}
</style>