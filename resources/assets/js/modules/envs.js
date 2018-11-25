// 在这个文件中管理所有的环境变量，然后在整个应用中使用这些变量。
/*
|-------------------------------------------------------------------------------
| VUEX modules/envs.js
|-------------------------------------------------------------------------------
| The Vuex data store for the envs
*/

// 导入环境变量相关 API，使用其中的 API 请求方法来加载数据
import EnvAPI from '../api/env.js';

// 导出一个常量作为环境变量模块, 这就是要添加到数据存储器的模块
export const envs = {
    /**
     * Defines the state being monitored for the module.
     */
    // 想要跟踪数据的状态
    state: {
        appName: {},    // 存储应用名称的对象
        appNameLoadStatus: 0,   // 加载状态: 0 -> 数据尚未加载, 1 -> 数据开始加载, 2 -> 数据加载成功, 3 -> 数据加载失败
        dbConnectStatus: 0, // 跟踪数据库连接状态
        userInfo: {},
        userInfoLoadStatus: 0,
        userName: window.sessionStorage.getItem('userName'),
        password: window.sessionStorage.getItem('password'),
        password: window.sessionStorage.getItem('permission')
    },
    /**
     * Defines the actions used to retrieve the data.
     */
     // 用于被调用来修改状态
    actions: {
        loadAppName( { commit } ){  // 析构参数 commit ，该参数通过 Vuex 传入，允许我们提交 mutations
            commit( 'setAppNameLoadStatus', 1 );

            EnvAPI.getAppName()
                .then( function( response ){
                    commit( 'setAppName', response.data );
                    commit( 'setAppNameLoadStatus', 2 );
                })
                .catch( function(){
                    commit( 'setAppName', {} );
                    commit( 'setAppNameLoadStatus', 3 );
                });
        },
        loadUserInfo( { commit }, data){
            commit( 'setUserInfoLoadStatus', 1 );

            EnvAPI.postUserInfo( data.userName, data.password )
                .then( function( response ){
                    commit( 'setUserInfo', response.data );
                    commit( 'setUserInfoLoadStatus', 2);
                    window.sessionStorage.setItem('userName', response.data.userName);
                    window.sessionStorage.setItem('password', response.data.password);
                    window.sessionStorage.setItem('permission', response.data.permission);
                })
                .catch( function(){
                    commit( 'setUserInfo', {});
                    commit( 'setUserInfoLoadStatus', 3);
                    throw "fdfdsf";
                });
        },
        resetUserInfo( { commit } ){
            commit( 'setUserInfoLoadStatus', 0 );
        },
        logout( { commit } ){
            commit( 'removeUserInfo' );
            commit( 'setUserInfoLoadStatus', 0 );
        }            
    },
    /**
     * Defines the mutations used
     */
    // 定义了数据的更新方式，每个模块都有 state，每个 state 都需要对应的 mutation 来更新
    mutations: {
        setAppNameLoadStatus( state, status ){
          state.appNameLoadStatus = status;
        },

        setAppName( state, appName ){
          state.appName = appName;
        },

        setUserInfoLoadStatus( state, status ){
          state.userInfoLoadStatus = status;
        },

        setUserInfo( state, userInfo ){
          state.userInfo = userInfo;
        },

        removeUserInfo( state ){
            state.userName = null;
            state.password = null;
            state.permission = null;
            window.sessionStorage.removeItem('userName');
            window.sessionStorage.removeItem('password');
            window.sessionStorage.removeItem('permission');
        }
    },
    /**
     * Defines the getters used by the module
     */
    // 从模块中获取数据
    getters: {
        getAppNameLoadStatus( state ){
          return state.appNameLoadStatus;
        },

        getAppName( state ){
          return state.appName;
        },

        getUserInfoLoadStatus( state ){
          return state.userInfoLoadStatus;
        },

        getUserInfo( state ){
          return state.userInfo;
        }
    }
}