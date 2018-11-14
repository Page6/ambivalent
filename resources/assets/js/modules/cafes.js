// 在这个文件中管理所有的咖啡店数据，然后在整个应用中使用这些数据。
/*
|-------------------------------------------------------------------------------
| VUEX modules/cafes.js
|-------------------------------------------------------------------------------
| The Vuex data store for the cafes
*/

// 导入咖啡店相关 API，使用其中的 API 请求方法来加载数据
import CafeAPI from '../api/cafe.js';

// 导出一个常量作为咖啡店模块, 这就是要添加到数据存储器的模块
export const cafes = {
	/**
     * Defines the state being monitored for the module.
     */
	// 想要跟踪数据的状态
	state: {
        cafes: [],	// 咖啡店数组
        cafesLoadStatus: 0,	// 加载状态: 
        cafe: {},	// 存储单个咖啡店的对象
        cafeLoadStatus: 0	//0 -> 数据尚未加载, 1 -> 数据开始加载, 2 -> 数据加载成功, 3 -> 数据加载失败
    },
    /**
     * Defines the actions used to retrieve the data.
     */
    // 用于被调用来修改状态
    actions: {
        loadCafes( { commit } ){	// 析构参数 commit ，该参数通过 Vuex 传入，允许我们提交 mutations
        	commit( 'setCafesLoadStatus', 1 );

	        CafeAPI.getCafes()
	            .then( function( response ){
	                commit( 'setCafes', response.data );
	                commit( 'setCafesLoadStatus', 2 );
	            })
	            .catch( function(){
	                commit( 'setCafes', [] );
	                commit( 'setCafesLoadStatus', 3 );
	            });
        },
        loadCafe( { commit }, data ){	// data 参数是一个对象，包含我们想要加载的咖啡店的 ID
        	commit( 'setCafeLoadStatus', 1 );

	        CafeAPI.getCafe( data.id )
	            .then( function( response ){
	                commit( 'setCafe', response.data );
	                commit( 'setCafeLoadStatus', 2 );
	            })
	            .catch( function(){
	                commit( 'setCafe', {} );
	                commit( 'setCafeLoadStatus', 3 );
	            });
        }
    },
    /**
     * Defines the mutations used
     */
    // 定义了数据的更新方式，每个模块都有 state，每个 state 都需要对应的 mutation 来更新
    mutations: {
	    setCafesLoadStatus( state, status ){
	      state.cafesLoadStatus = status;
	    },

	    setCafes( state, cafes ){
	      state.cafes = cafes;
	    },

	    setCafeLoadStatus( state, status ){
	      state.cafeLoadStatus = status;
	    },

	    setCafe( state, cafe ){
	      state.cafe = cafe;
	    }
	},
	/**
     * Defines the getters used by the module
     */
	// 从模块中获取数据
	getters: {
	    getCafesLoadStatus( state ){
	      return state.cafesLoadStatus;
	    },

	    getCafes( state ){
	      return state.cafes;
	    },

	    getCafeLoadStatus( state ){
	      return state.cafeLoadStatus;
	    },

	    getCafe( state ){
	      return state.cafe;
	    }
	}
}