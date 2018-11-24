<style lang="scss">
    @import '~@/layouts/_theme.scss';
</style>

<template>
  <div>
  	{{ appName }}
  </div>
</template>

<script>
	export default {
		created() {
			// 通过环境变量.env文件定义网站信息(示例)
			this.$store.dispatch( 'loadAppName' );
        },
		computed: {
			appName: function() {
				return this.$store.getters.getAppName;
			}
		}
	}
</script>