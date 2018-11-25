/**
 * Imports the Roast API URL from the config.
 */
// 在该文件中引入上一步导出的 ROAST_CONFIG，以便获取 API_URL 来发起请求
import { ROAST_CONFIG } from '../config.js';

// 导出一个默认模块以便可以在应用的其它任何地方使用 API 请求
export default {
	/**
     * GET /api/v1/app/name
     */
    getAppName: function(){
        return axios.get( ROAST_CONFIG.API_URL + '/app/name' );
    },
    /**
     * POST /api/v1/user/info
     */
    postUserInfo: function( userName, password ){
        // return axios.get( ROAST_CONFIG.API_URL + '/user/info' );
        return axios.post( ROAST_CONFIG.API_URL + '/user/info',
            {
                userName: userName,
                password: password
            }
        );
    }
}