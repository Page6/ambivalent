/*
 |-------------------------------------------------------------------------------
 | VUEX store.js
 |-------------------------------------------------------------------------------
 | Builds the data store from all of the modules for the Roast app.
 */
// Vuex 模块的起点

/**
 * Adds the promise polyfill for IE 11
 */
require('es6-promise').polyfill();

/**
 * Import Vue and Vuex
 */
import Vue from 'vue'
import Vuex from 'vuex'

/**
 * Initializes Vuex on Vue.
 */
// 告知 Vue 使用 Vuex 作为数据存储器
Vue.use( Vuex )

/**
 * Imports all of the modules used in the application to build the data store.
 */
import { cafes } from './modules/cafes.js'

/**
 * Export the data store.
 */
// 导出一个新的 Vuex 数据存储器
export default new Vuex.Store({
    modules: {
    	cafes
    }
});
