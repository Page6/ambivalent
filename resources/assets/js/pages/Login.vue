<style lang="scss">
    @import '~@/abstracts/_variables.scss';
    @import '~@/layouts/_login.scss';
</style>

<template>
	<div class="login">
		<div class="login-con">
			<Card icon="log-in" title="欢迎进入" :bordered="false">
				<div class="form-con">
					<login-form @on-success-valid="handleSubmit"></login-form>
					<p class="login-tip">请输入用户名和密码登录</p>
				</div>
			</Card>
		</div>
	</div>
</template>

<script>
	import LoginForm from '../components/global/LoginForm.vue';

	export default {
	    components: {
            LoginForm
        },
        methods: {
			handleSubmit: function({ userName, password }) {
				this.$Message.success('登录成功！');
			}
	    }
	}
</script>