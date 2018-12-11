<style lang="scss">
    
</style>

<template>
	<Form ref="resetForm" :model="form" :rules="rules" @keydowm.enter.native="handleSubmit" >
		<FormItem prop="password">
			<Input type="password" v-model="form.password" placeholder="请输入密码">
				<!-- <Icon type="ios-person-outline" slot="prepend"></Icon> -->
			</Input>
		</FormItem>
		<FormItem prop="repeat">
			<Input type="password" v-model="form.repeat" placeholder="请再次输入密码">
				<!-- <Icon type="ios-lock-outline" slot="prepend"></Icon> -->
			</Input>
		</FormItem>
		<FromItem>
			<!-- <Button class="signin" type="primary" @click="handleSubmit('form')">登录</Button> -->
			<Button type="primary" @click="handleSubmit('form')">确认修改</Button>
		</FromItem>
	</Form>
</template>

<script>
	export default {
		data() {
			return {
				form: {
					password: '',
					repeat: ''
				},
				rules: {
					password: [
						{ required: true, message: '密码不能为空', trigger: 'blur' },
						{ type: 'string', min: 6, message: '密码不能少于6位' }
					],
					repeat: [
						{ required: true, message: '密码不能为空', trigger: 'blur' },
						{ type: 'string', min: 6, message: '密码不能少于6位' }
					]
				}
			}
		},
		methods: {
			handleSubmit: function() {
				this.$refs.resetForm.validate((valid) => {
					if (valid) {
						if (this.form.password != this.form.repeat){
							this.$Message.error('密码不匹配，请重新输入！');
							this.$refs.resetForm.resetFields();
						} else{
							this.$Message.success('验证成功！');
							// this.$router.push('/home');
							this.$emit('on-success-valid', {
					            password: this.form.password
					          });
						}
					} else {
						this.$Messge.error('验证失败！');
					}
				})
			}
		}
	}
</script>