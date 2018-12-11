<style lang="scss">
    @import '~@/abstracts/_variables.scss';
    @import '~@/layouts/_reset.scss';
</style>

<template>
    <div>
    	<div class="page-container">
			<reset-form @on-success-valid="handleSubmit"></reset-form>
			<div style="display: none;">{{resetPasswordStatus}}</div>
		</div>
    </div>
</template>

<script>
	import ResetForm from '../components/global/ResetForm.vue';

	export default {
		components: {
            ResetForm
        },
		created() {
        },
        /**
		 * 定义组件的计算属性
		*/
		computed: {
			resetPasswordStatus: function() {
				if(this.$store.getters.getResetPasswordStatus == 2){
					this.$Message.success('修改成功！');
					this.$router.push('/home');
					this.$store.dispatch('resetResetPassword');
				} else if (this.$store.getters.getResetPasswordStatus == 3) {
					this.$Message.error('修改失败！');
					// this.$router.push('/login');
					this.$store.dispatch('resetResetPassword');
				}
				return this.$store.getters.getResetPasswordStatus;
			}
		},
		methods: {
			handleSubmit: function({ password }) {
				this.$store.dispatch('resetPassword', {
					password: password
				});
			}
	    }
	}
</script>