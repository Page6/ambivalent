/**
 * Imports the API URL from the config.
 */
// 在该文件中引入上一步导出的 ROAST_CONFIG，以便获取 API_URL 来发起请求
import { ROAST_CONFIG } from '../config.js';

// 导出一个默认模块以便可以在应用的其它任何地方使用 API 请求
export default {
	/**
     * POST /api/v1/reports
     */
    postReports: function( permission ){
        return axios.post( ROAST_CONFIG.API_URL + '/reports',
            {
                permission: permission
            } );
    },
    /**
     * GET /api/v1/reports/{reportID}
     */
    getReport: function( reportID ){
        return axios.get( ROAST_CONFIG.API_URL + '/reports/' + reportID );
    },
    /**
     * POST /api/v1/results
     */
    postResults: function( search ){
        return axios.post( ROAST_CONFIG.API_URL + '/results',
            {
                search: search
            } );
    },
    /**
     * GET /api/v1/columns/{reportID}
     */
    getColumns: function( reportID ){
        return axios.get( ROAST_CONFIG.API_URL + '/columns/' + reportID );
    }
}