<style>

</style>

<template>
	<div>
		<Card>
			<results ref="results" :columns="columns" v-model="resultData"></results>
			<Button style="margin: 10px 0;" type="primary" @click="exportExcel">导出为csv文件</Button>
		</Card>
	</div>
</template>

<script>
	import Results from '../components/tables/Results.vue';

	export default {
		components: {
			Results
		},
		data () {
			return {
				columns: [],
				resultData:[]
			}
		},
		created() {
			// this.$Message.info('this.$route.params.id');
        },
		methods: {
			exportExcel () {
				// this.$Message.info('this is a info.'+this.$refs.message1.value);
				this.$refs.results.exportCsv({
					filename: `result-${(new Date()).valueOf()}.csv`
				})
			}
		}
	}
</script>