<template>
<md-bottom-bar class="fixed-bottom">
  <md-bottom-bar-item md-iconset="icon-speedometer">Random Shit</md-bottom-bar-item>
  <md-bottom-bar-item md-iconset="icon-heart" md-active>Goes Here</md-bottom-bar-item>
  <md-bottom-bar-item md-iconset="icon-cursor">Baby</md-bottom-bar-item>
</md-bottom-bar>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss">
	.fixed-bottom{
		position: fixed;
		bottom: 0;
		z-index: 9999;
	}
</style>
