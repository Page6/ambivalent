<style lang="scss">
    @import '~@/abstracts/_variables.scss';
    @import '~@/layouts/_theme.scss';
</style>

<template>
    <Layout  class="layout">
        <Sider class="layout-menu-left" hide-trigger>
            <navigation></navigation>
        </Sider> 
        <Layout :style="{marginLeft: '200px'}">
            <Header class="layout-logo">
                <logo></logo>
            </Header>   
            <Content class="layout-content">
                <router-view class="layout-content-main"></router-view>
            </Content>
            <Footer class="layout-copy">
                <copyright></copyright>
            </Footer>
        </Layout>
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
        }
    }
</script>