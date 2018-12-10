<style lang="scss">
    @import '~@/abstracts/_variables.scss';
    @import '~@/layouts/_theme.scss';
</style>

<template>
    <Layout class="layout">
        <Header class="header">
            <navigation></navigation>
        </Header>
        <Content class="layout-content">
            <Breadcrumb :style="{margin: '20px 0'}">
                <BreadcrumbItem>{{userName}}</BreadcrumbItem>
                <BreadcrumbItem>主页</BreadcrumbItem>
            </Breadcrumb>
            <router-view class="layout-content-main"></router-view>
        </Content>
        <Footer class="layout-copy">
            <copyright></copyright>
        </Footer>
    </Layout>
</template>

<script>
    import Navigation from '../components/global/Navigation.vue';
    import Logo from '../components/global/Logo.vue';
    import Copyright from '../components/global/Copyright.vue';

    export default {
        components: {
            Navigation,
            Logo,
            Copyright
        },
        computed: {
            // 从 Vuex 中获取用户信息
            userName: function(){
                return window.sessionStorage.getItem('userName');
            }
        }
    }
</script>