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
            <div class="swiper-container" id="slide">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image:url(../../images/slide.jpg);">
                        <div class="caption scroll-animation" data-animation="pulse" data-animation-delay="0s">
                            <h1 v-if="routerName == '综合查询系统'"><span>欢迎进入</span></h1>
                            <h1><span>{{ routerName }}</span></h1>
                        </div>
                    </div>
                </div>
            </div>
            <Breadcrumb :style="{margin: '20px 0'}">
                <BreadcrumbItem>当前用户：{{ userName }}</BreadcrumbItem>
                <BreadcrumbItem>{{ routerName }}</BreadcrumbItem>
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
        data () {
            return {
                routers: {
                    'home':'综合查询系统',
                    'reports':'报表管理',
                    'report':'报表查询'
                }
            }
        },
        computed: {
            // 从 Vuex 中获取用户信息
            userName: function(){
                return window.sessionStorage.getItem('userName');
            },
            routerName: function(){
                // return this.$route.path.split('/')[1];
                return this.routers[this.$route.path.split('/')[1]];
            }
        }
    }
</script>