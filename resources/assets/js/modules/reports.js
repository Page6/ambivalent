// 在这个文件中管理所有的报表变量，然后在整个应用中使用这些变量。
/*
|-------------------------------------------------------------------------------
| VUEX modules/reports.js
|-------------------------------------------------------------------------------
| The Vuex data store for the reports
*/

// 导入报表相关 API，使用其中的 API 请求方法来加载数据
import ReportAPI from '../api/report.js';

// 导出一个常量作为报表模块, 这就是要添加到数据存储器的模块
export const reports = {
	/**
     * Defines the state being monitored for the module.
     */
	// 想要跟踪数据的状态
	state: {
        reports: [],	// 报表数组
        reportsLoadStatus: 0,	// 加载状态: 0 -> 数据尚未加载, 1 -> 数据开始加载, 2 -> 数据加载成功, 3 -> 数据加载失败
        report: {},	// 存储单个报表的对象
        reportLoadStatus: 0,	//结果加载状态
        results: [],	//结果数组
        resultsLoadStatus: 0,	//结果加载状态
        columns: [],	// 表头数组
        columnsLoadStatus: 0	//表头加载状态
    },
    /**
     * Defines the actions used to retrieve the data.
     */
    // 用于被调用来修改状态
    actions: {
        loadReports( { commit } ){	// 析构参数 commit ，该参数通过 Vuex 传入，允许我们提交 mutations
        	commit( 'setReportsLoadStatus', 1 );

        	let permission = window.sessionStorage.getItem('permission');
        	
	        ReportAPI.postReports(permission)
	            .then( function( response ){
	                commit( 'setReports', response.data );
	                commit( 'setReportsLoadStatus', 2 );
	            })
	            .catch( function(){
	                commit( 'setReports', [] );
	                commit( 'setReportsLoadStatus', 3 );
	            });
        },
        loadReport( { commit }, data ){	// data 参数是一个对象，包含我们想要加载的报表的 ID
        	commit( 'setReportLoadStatus', 1 );

	        ReportAPI.getReport( data.id )
	            .then( function( response ){
	                commit( 'setReport', response.data );
	                commit( 'setReportLoadStatus', 2 );
	            })
	            .catch( function(){
	                commit( 'setReport', {} );
	                commit( 'setReportLoadStatus', 3 );
	            });
        },
        loadResults( { commit }, data ){	// data 参数是一个对象，包含我们想要加载的结果的查询参数
        	commit( 'setResultsLoadStatus', 1 );

	        ReportAPI.postResults( data.search )
	            .then( function( response ){
	                commit( 'setResults', response.data );
	                commit( 'setResultsLoadStatus', 2 );
	            })
	            .catch( function(){
	                commit( 'setResults', [] );
	                commit( 'setResultsLoadStatus', 3 );
	            });
        },
        loadColumns( { commit }, data ){	// data 参数是一个对象，包含我们想要加载的报表的 ID
        	commit( 'setColumnsLoadStatus', 1 );

	        ReportAPI.getColumns( data.id )
	            .then( function( response ){
	                commit( 'setColumns', response.data );
	                commit( 'setColumnsLoadStatus', 2 );
	            })
	            .catch( function(){
	                commit( 'setColumns', {} );
	                commit( 'setColumnsLoadStatus', 3 );
	            });
        }
    },
    /**
     * Defines the mutations used
     */
    // 定义了数据的更新方式，每个模块都有 state，每个 state 都需要对应的 mutation 来更新
    mutations: {
	    setReportsLoadStatus( state, status ){
	      state.reportsLoadStatus = status;
	    },

	    setReports( state, reports ){
	      state.reports = reports;
	    },

	    setReportLoadStatus( state, status ){
	      state.reportLoadStatus = status;
	    },

	    setReport( state, report ){
	      state.report = report;
	    },

	    setResultsLoadStatus( state, status ){
	      state.resultsLoadStatus = status;
	    },

	    setResults( state, results ){
	      state.results = results;
	    },

	    setColumnsLoadStatus( state, status ){
	      state.columnsLoadStatus = status;
	    },

	    setColumns( state, columns ){
	      state.columns = columns;
	    }
	},
	/**
     * Defines the getters used by the module
     */
	// 从模块中获取数据
	getters: {
	    getReportsLoadStatus( state ){
	      return state.reportsLoadStatus;
	    },

	    getReports( state ){
	      return state.reports;
	    },

	    getReportLoadStatus( state ){
	      return state.reportLoadStatus;
	    },

	    getReport( state ){
	      return state.report;
	    },

	    getResultsLoadStatus( state ){
	      return state.resultsLoadStatus;
	    },

	    getResults( state ){
	      return state.results;
	    },

	    getColumnsLoadStatus( state ){
	      return state.columnsLoadStatus;
	    },

	    getColumns( state ){
	      return state.columns;
	    }
	}
}