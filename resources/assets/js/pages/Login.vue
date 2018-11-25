<style lang="scss">
    @import '~@/abstracts/_variables.scss';
    @import '~@/layouts/_login.scss';
</style>

<template>
	<div class="login">
		<div style="display: none;">{{userInfoLoadStatus}}</div>
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
        computed: {
			userInfoLoadStatus: function() {
				if(this.$store.getters.getUserInfoLoadStatus == 2){
					this.$Message.success('登录成功！');
					this.$router.push('/home');
					this.$store.dispatch('resetUserInfo');
				} else if (this.$store.getters.getUserInfoLoadStatus == 3) {
					this.$Message.error('登录失败！');
					// this.$router.push('/login');
					this.$store.dispatch('resetUserInfo');
				}
				return this.$store.getters.getUserInfoLoadStatus;
			}
		},
        methods: {
			handleSubmit: function({ userName, password }) {
				this.$store.dispatch('loadUserInfo', {
					userName: userName,
					password: password
				});
			},
			validateUserInfo: function(){
				let validUserInfo = false; 
				if (this.$store.getters.getUserInfoLoadStatus == 3){
					validUserInfo = true;
				}

		        return validUserInfo;
		    }
	    }
	}
</script>