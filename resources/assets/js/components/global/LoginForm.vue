<style lang="scss">
	
</style>

<template>
	<Form ref="loginForm" :model="form" :rules="rules" @keydowm.enter.native="handleSubmit" >
		<FormItem prop="userName">
			<Input type="text" v-model="form.userName" placeholder="请输入用户名">
				<Icon type="ios-person-outline" slot="prepend"></Icon>
			</Input>
		</FormItem>
		<FormItem prop="password">
			<Input type="text" v-model="form.password" placeholder="密码">
				<Icon type="ios-lock-outline" slot="prepend"></Icon>
			</Input>
		</FormItem>
		<FromItem>
			<Button type="primary" @click="handleSubmit('form')">登录</Button>
		</FromItem>
	</Form>
</template>

<script>
	export default {
		data() {
			return {
				form: {
					userName: '',
					password: ''
				},
				rules: {
					userName: [
						{ required: true, message: '用户名不能为空', trigger: 'blur' }
					],
					password: [
						{ required: true, message: '密码不能为空', trigger: 'blur' },
						{ type: 'string', min: 6, message: '密码不能少于6位' }
					]
				}
			}
		},
		methods: {
			handleSubmit: function() {
				this.$refs.loginForm.validate((valid) => {
					if (valid) {
						this.$Message.success('验证成功！');
						// this.$router.push('/home');
						this.$emit('on-success-valid', {
				            userName: this.form.userName,
				            password: this.form.password
				          });
					} else {
						this.$Messge.error('验证失败！');
					}
				})
			}
		}
	}
</script>