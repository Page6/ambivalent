<style lang="scss">
    @import '~@/components/_search.scss';
</style>

<template>
	<div>
		<div class="search-con search-con-top">
			<Input
				@on-change="handleClear" 
				clearable 
				placeholder="输入关键字搜索" 
				class="search-input" 
				v-model="searchValue"/>
			<Button @click="handleSearch" class="search-btn" type="primary">
				<Icon type="search"/>&nbsp;搜索
			</Button>
		</div>
		<Table 
			:data="insideTableData"
			:columns="insideColumns"
			height="800"
			@on-filter-change="onFilterChange"
		></Table>
	</div>
</template>

<script>
  export default {
  	props: {
		value: {
			type: Array,
			default () {
				return [];
			}
		},
		columns: {
			type: Array,
			default () {
				return [];
			}
		}
	},
  	data () {
		return {
			insideColumns: [],
			insideTableData: [],
			searchValue: '',
			searchKey: ''
		}
	},
	computed: {
	},
	methods: {
		handleColumns (columns) {
			this.insideColumns = columns.map((item, index) => {
				let res = item;
				return res;
			})
		},
		setDefaultSearchKey () {
			this.searchKey = this.columns[2].key;
		},
		handleClear (e) {
			if (e.target.value === '') this.insideTableData = this.value;
		},
		handleSearch: function() {
			this.insideTableData = this.value.filter(item => item[this.searchKey].indexOf(this.searchValue) > -1);
		},
		handleTableData () {
			this.insideTableData = this.value.map((item, index) => {
				let res = item;
				res.initRowIndex = index;
				return res;
			})
	    },
	    onFilterChange (row) {
		this.$emit('on-filter-change', row);
		},
	},
	watch: {
		columns (columns) {
			this.handleColumns(columns);
			this.setDefaultSearchKey();
		},
		value (val) {
			this.handleTableData();
			this.handleSearch();
		}
	},
	mounted () {
		this.handleColumns(this.columns);
    	this.setDefaultSearchKey();
		this.handleTableData();
	}
  }
</script>