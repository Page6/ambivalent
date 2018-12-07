<style lang="scss">
    @import '~@/components/_search.scss';
</style>

<template>
	<div>
		<Form 
			ref="formSearch" 
			:model="formSearch" 
			:label-width="80" 
			style="width: 400px"
		>
			<Spin size="large" fix v-if="spinShow"></Spin>
			<!-- <Span>{{columns}}</Span> -->
	        <FormItem
	            v-for="(item, index) in formSearch"
	            v-if="item.status"
	            :key="index"
	        >
	            <FormItem 
	            	v-if="item.status == 1" 
	            	:prop="index + '.value'"
	            	:label="item.title"
	            	:rules="{required: false, message: item.title +' 不能为空', trigger: 'blur'}"
	        	>
	            	<Row>
		                <Col span="18">
		                    <Input type="text" v-model="item.value" placeholder="Enter something..."></Input>
		                </Col>
		                <!-- <Col span="4" offset="1">
		                    <Button @click="handleRemove(index)">Delete</Button>
		                </Col> -->
		            </Row>
	            </FormItem>
	            <FormItem 
	            	v-if="item.status == 2" 
	            	:prop="index + '.value'"
	            	:label="item.title"
	            	:rules="{required: false, message: item.title +' 不能为空', trigger: 'blur'}"
	        	>
	            	<Row>
		                <Col span="18">
		                    <Input type="date" v-model="item.value" placeholder="Enter something..."></Input>
		                </Col>
		                <!-- <Col span="4" offset="1">
		                    <Button @click="handleRemove(index)">Delete</Button>
		                </Col> -->
		            </Row>
	            </FormItem>
	            <FormItem 
	            	v-if="item.status == 3" 
	            	:prop="index + '.value'"
	            	:label="item.title"
	            	
	        	>
	            	<Row>
		                <Col span="18">
		                    <Select v-model="item.value" multiple >
								<Option v-for="i in selectList" :value="i.value" :key="i.value">
									{{ i.label }}
								</Option>
							</Select>
		                </Col>
		                <!-- <Col span="4" offset="1">
		                    <Button @click="handleRemove(index)">Delete</Button>
		                </Col> -->
		            </Row>
	            </FormItem>
	        </FormItem>
	        <!-- <FormItem>
	            <Row>
	                <Col span="12">
	                    <Button type="dashed" long @click="handleAdd" icon="md-add">Add item</Button>
	                </Col>
	            </Row>
	        </FormItem> -->
	        <FormItem>
	            <Button type="primary" @click="handleSubmit('formSearch')">查询</Button>
	            <Button @click="handleReset('formSearch')" style="margin-left: 8px">清空</Button>
	        </FormItem>
	    </Form>
		<Table 
			ref="resultsMain"
			:data="insideTableData"
			:columns="insideColumns"
			height="400px"
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
			spinShow: false,
            index: 2,
            selectList: [
				{
					value: 'item1',
					label: 'Item1'
				},
				{
					value: 'item2',
					label: 'Item2'
				},
				{
					value: 'item3',
					label: 'Item3'
				},
				{
					value: 'item4',
					label: 'Item4'
				},
				{
					value: 'item5',
					label: 'Item5'
				}
			],
			insideColumns: [],
			insideTableData: []
		}
	},
	created: function() {
		// this.$Message.info(this.$route.params.id);
		this.$store.dispatch( 'loadReport', {
			id: this.$route.params.id
		});
		this.$store.dispatch( 'loadColumns', {
			id: this.$route.params.id
		});
    },
	computed: {
		formSearch: function(){
	    	return this.$store.getters.getReport;
	    },
		results: function(){
	    	return this.$store.getters.getResults;
	    	// return this.$store.getters.getReport;
	    },
	    columns: function(){
	    	return this.$store.getters.getColumns;
	    }
	},
	methods: {
		switchResults () {
    		this.spinShow = true;
    		setTimeout(() => {
    			if (this.$store.getters.getResultsLoadStatus == '2'){
    				this.insideTableData = this.$store.getters.getResults;
    				this.spinShow = false;
    			}
			}, 1000);
    	},
        handleSubmit (name) {
            this.$refs[name].validate((valid) => {
                if (valid) {
                    // this.$Message.success('Success!');
                    // this.$Message.success(this.formDynamic.items[1].value);
					this.$store.dispatch( 'loadResults', {
						search: ['sa','sb']
					} );
					this.switchResults();
                } else {
                    this.$Message.error('Fail!');
                }
            })
        },
        handleReset (name) {
            this.$refs[name].resetFields();
        },
		handleColumns (columns) {
			this.insideColumns = columns.map((item, index) => {
				let res = item;
				return res;
			})
		},
		handleTableData () {
			this.insideTableData = this.value.map((item, index) => {
				let res = item;
				res.initRowIndex = index;
				return res;
			})
	    },
	    exportCsv (params) {
			this.$refs.resultsMain.exportCsv(params)
		}
	},
	watch: {
		columns (columns) {
			this.handleColumns(columns);
		},
		value (val) {
			this.handleTableData();
		}
	},
	mounted () {
		this.handleColumns(this.columns);
		this.handleTableData();
	}
  }
</script>