<style lang="scss">
    @import '~@/layouts/_theme.scss';
</style>
<template>
    <Menu mode="horizontal" active-name="" theme="dark" :open-names="['']">
        <div class="layout-logo-top">
            <a href="/#/home">
                <img src="../../../images/logo.png" width="200" height="30" alt="综合查询系统" />
            </a>
        </div>
        <div class="layout-nav">
            <Submenu name="1">
                <template slot="title">
                    <Icon type="ios-contact"></Icon>
                    用户管理
                </template>
                <MenuItem name="1-1" to="/password/reset">
                    <Icon type="ios-key"></Icon>
                    修改密码
                </MenuItem>
                <MenuItem name="1-2" @click.native="modal1 = true">
                    
                        <Icon type="ios-log-out"></Icon>
                        退出
                    
                </MenuItem>
                <Modal
                    v-model="modal1"
                    title="离开系统"
                    @on-ok="ok"
                    @on-cancel="cancel">
                    <p>是否退出系统？</p>
                </Modal>
            </Submenu>
            <Submenu name="2">
                <template slot="title">
                    <Icon type="ios-search"></Icon>
                    数据管理
                </template>
                <MenuItem name="2-1" @click.native="loadReports">
                    <Icon type="ios-paper"></Icon>
                    报表查询
                </MenuItem>
                <MenuItem name="2-2" to="/traces">
                    <Icon type="ios-calendar"></Icon>
                    跟踪日志
                </MenuItem>
            </Submenu>
            <Submenu name="3">
                <template slot="title">
                    <Icon type="ios-folder"></Icon>
                    上传管理
                </template>
                <MenuItem name="3-1">
                    <Icon type="ios-cloud-upload"></Icon>
                    系统更新
                </MenuItem>
                <MenuItem name="3-2">
                    <Icon type="ios-podium"></Icon>
                    数据更新
                </MenuItem>
            </Submenu>
        </div>
    </Menu>
</template>
<script>
    export default {
        data() {
            return {
                modal1: false
            }
        },
        // 定义组件的计算属性
        computed: {
            // 从 Vuex 中获取用户加载状态
            // userLoadStatus: function(){
            //     return this.$store.getters.getUserLoadStatus;
            // },
        },
        methods: {
            loadReports: function(){
                // this.$store.dispatch('loadReports');
                this.$router.push('/reports');
                // return this.$store.getters.getReportsLoadStatus;
            },
            ok: function(){
                // window.opener=null;
                // window.close();
                // if (this.userInfoLoadStatus() == '0'){
                this.$store.dispatch('logout');
                this.$router.push('/login');
                // }
            },
            cancel: function(){
                this.$Message.info('操作已取消');
            }
        }
    }
</script>