/**
 * Imports the Roast API URL from the config.
 */
// 在该文件中引入上一步导出的 ROAST_CONFIG，以便获取 API_URL 来发起请求
import { ROAST_CONFIG } from '../config.js';

// 导出一个默认模块以便可以在应用的其它任何地方使用 API 请求
export default {
	/**
     * GET /api/v1/cafes
     */
    getCafes: function(){
        return axios.get( ROAST_CONFIG.API_URL + '/cafes' );
    },
    /**
     * GET /api/v1/cafes/{cafeID}
     */
    getCafe: function( cafeID ){
        return axios.get( ROAST_CONFIG.API_URL + '/cafes/' + cafeID );
    },
    /**
     * POST /api/v1/cafes
     */
    postAddNewCafe: function( name, address, city, state, zip, picture ){
        let formData = new FormData();
        formData.append('name', name);
        formData.append('address', address);
        formData.append('city', city);
        formData.append('state', state);
        formData.append('zip', zip);
        formData.append('picture', picture);
        return axios.post( ROAST_CONFIG.API_URL + '/cafes',
            formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
        );
    }
}