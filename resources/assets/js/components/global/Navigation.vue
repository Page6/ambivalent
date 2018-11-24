<style lang="scss">
    @import '~@/layouts/_theme.scss';
</style>
<template>
    <div>
        <Menu active-name="" theme="dark" width="dark" :open-names="['']">
            <!--读取用户名-->
            <div class="layout-logo-left">【{{ userName }}】</div>
            <Submenu name="1">
                <template slot="title">
                    <Icon type="ios-contact"></Icon>
                    用户管理
                </template>
                <MenuItem name="1-1">修改密码</MenuItem>
                <MenuItem name="1-2">注册用户</MenuItem>
            </Submenu>
            <Submenu name="2">
                <template slot="title">
                    <Icon type="ios-search"></Icon>
                    数据管理
                </template>
                <MenuItem name="2-1">报表查询</MenuItem>
                <MenuItem name="2-2">统计分析</MenuItem>
            </Submenu>
            <MenuGroup>
                <MenuItem name="3" @click.native="modal1 = true">
                    
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
            </MenuGroup>
        </Menu>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                modal1: false
            }
        },
        created: {},
        // 定义组件的计算属性
        computed: {
            // 从 Vuex 中获取用户加载状态
            // userLoadStatus: function(){
            //     return this.$store.getters.getUserLoadStatus;
            // },

            // 从 Vuex 中获取用户信息
            userName: function(){
                return window.sessionStorage.getItem('userName');
            }
        },
        methods: {
            ok: function(){
                // 直接关闭当前页面
                // window.opener=null;
                // window.close();
                // if (this.userInfoLoadStatus() == '0'){
                // 清除用户信息，返回登录页面
                this.$store.dispatch('logout');
                this.$router.push('/login');
                // }
            },
            cancel: function(){
                this.$Message.info('操作已取消');
            }
            // userInfoLoadStatus: function(){
            //     this.$store.dispatch('logout');
            //     return this.$store.getters.getUserInfoLoadStatus;
            // }
        }
    }
</script>