<style lang="scss">
    @import '~@/components/_search.scss';
</style>

<template>
    <div>
        <Card>
			<logs ref="tables" :columns="columns" v-model="tracesData"></logs>
		</Card>
    </div>
</template>

<script>
	import Logs from '../components/tables/Logs.vue';

	export default {
		components: {
			Logs
		},
		data () {
			return {
				columns:[
					{
						type: 'index',
						width: 60,
						align: 'center'
					},
					{
						title: '用户',
						key: 'operator',
						width: 200,
						align: 'center'
					},
					{
						title: '操作时间',
						key: 'operated_at',
						width:200,
						align: 'center'
					},
					{
						title: '报表',
						key: 'report',
						width:200,
						align: 'center'
					},
					{
						title: '查询参数',
						key: 'params',
						align: 'center'
					}
				]
			}
		},
		created() {
			this.$store.dispatch( 'loadTraces' );
        },
        /**
		 * 定义组件的计算属性
		*/
		computed: {
		    // 获取 cafes
		    tracesData(){
		        return this.$store.getters.getTraces;
		    }
		}
	}
</script>