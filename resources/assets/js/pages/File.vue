<style lang="scss">
    @import '~@/abstracts/_variables.scss';
    @import '~@/layouts/_file.scss';
</style>

<template>
	<div>
        <div class="page-container">
			<Form 
				ref="uploadForm" 
				:model="form" 
				@keydowm.enter.native="handleSubmit" 
			>
				<Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
				<p>请选择需要上传的文件</p>
				<p>请确保文件格式为zip压缩文件</p>
				<FormItem 
					prop="file"
					:rules="{required: false, message: '上传文件不能为空', trigger: 'blur'}"
				>
					<input type="file" id="upload-file" ref="file" v-on:change="handleFileUpload()"/>
				</FormItem>
				<FormItem>
					<Button type="primary" @click="handleSubmit('form')">确认上传</Button>
				</FormItem>
			</Form>
			<div style="display: none;">{{fileLoadStatus}}</div>
		</div>
    </div>
</template>

<script>
	export default {
		computed: {
		    fileLoadStatus(){
				return this.$store.getters.getFileLoadStatus;
		    }
		},
		methods: {
			handleFileUpload() {
			    this.file = this.$refs.file.files[0];
			},
			handleSubmit (name) {
            	this.$Message.info('文件正在上传!');
            	this.$store.dispatch( 'loadFile', {
					file: this.file
				});
            }
        }
	}
</script>