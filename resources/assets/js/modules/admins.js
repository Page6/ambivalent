// 在这个文件中管理所有的报表变量，然后在整个应用中使用这些变量。
/*
|-------------------------------------------------------------------------------
| VUEX modules/reports.js
|-------------------------------------------------------------------------------
| The Vuex data store for the reports
*/

// 导入管理员相关 API，使用其中的 API 请求方法来加载数据
import AdminAPI from '../api/admin.js';

// 导出一个常量作为报表模块, 这就是要添加到数据存储器的模块
export const admins = {
	/**
     * Defines the state being monitored for the module.
     */
	// 想要跟踪数据的状态
	state: {
        traces: [],	// 报表数组
        tracessLoadStatus: 0	// 加载状态: 0 -> 数据尚未加载, 1 -> 数据开始加载, 2 -> 数据加载成功, 3 -> 数据加载失败
    },
    /**
     * Defines the actions used to retrieve the data.
     */
    // 用于被调用来修改状态
    actions: {
        loadTraces( { commit } ){	// 析构参数 commit ，该参数通过 Vuex 传入，允许我们提交 mutations
        	commit( 'setTracesLoadStatus', 1 );

	        AdminAPI.getTraces()
	            .then( function( response ){
	                commit( 'setTraces', response.data );
	                commit( 'setTracesLoadStatus', 2 );
	            })
	            .catch( function(){
	                commit( 'setTraces', [] );
	                commit( 'setTracesLoadStatus', 3 );
	            });
        }
    },
    /**
     * Defines the mutations used
     */
    // 定义了数据的更新方式，每个模块都有 state，每个 state 都需要对应的 mutation 来更新
    mutations: {
	    setTracesLoadStatus( state, status ){
	      state.tracesLoadStatus = status;
	    },

	    setTraces( state, traces ){
	      state.traces = traces;
	    }
	},
	/**
     * Defines the getters used by the module
     */
	// 从模块中获取数据
	getters: {
	    getTracesLoadStatus( state ){
	      return state.tracesLoadStatus;
	    },

	    getTraces( state ){
	      return state.traces;
	    }
	}
}