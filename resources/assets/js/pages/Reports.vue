<style lang="scss">
    @import '~@/components/_search.scss';
</style>

<template>
    <div>
        <Card>
			<selectors ref="tables" :columns="columns" v-model="reportsData"></selectors>
		</Card>
    </div>
</template>

<script>
	import Selectors from '../components/tables/Selectors.vue';

	export default {
		components: {
			Selectors
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
						title: '表单号',
						key: 'id',
						width: 100,
						align: 'center'
					},
					{
						title: '表单名称',
						key: 'name',
						align: 'center'
					},
					{
						title: '操作',
						key: 'action',
						width: 100,
						align: 'center',
						render: (h, params) => {
						 	return h('div', [
						 		h('Button', {
						 			props: {
						 				type: 'primary',
						 				size: 'small'
						 			},
						 			on: {
						 				click: () => {
						 					this.$router.push('/reports/'+this.reportsData[params.row.initRowIndex].id);
						 				}
						 			}
						 		}, '查询')])
						}
					}
				]
			}
		},
		created() {
			this.$store.dispatch( 'loadReports' );
        },
        /**
		 * 定义组件的计算属性
		*/
		computed: {
		    // 获取 cafes
		    reportsData(){
		        return this.$store.getters.getReports;
		    }
		},
		methods: {
			info() {
				this.$Message.info('this is a info.');
			}
		}
	}
</script>