<style>

</style>

<template>
    <div id="home">
    	<!-- <Button>Home</Button>
        <span v-show="cafesLoadStatus == 1">Loading</span>
        <span v-show="cafesLoadStatus == 2">Cafes loaded successfully!</span>
        <span v-show="cafesLoadStatus == 3">Cafes loaded unsuccessfully!</span> -->
        <section class="index-image">
			<div class="img-left">
				<img src="../../images/img24.jpg" />
			</div>
			<div class="information-right scroll-animation" data-animation="fadeInRight" data-animation-delay="0s">
				<h3>能用来做什么?</h3>
				<p>提供多种报表的统计与下载业务。通过“数据管理”→“报表查询”即可进入。</p>
				<!-- <a href="blog_inner.html" class="read-more">read more</a> -->
			</div>
		</section>
		<section class="index-image index-image-right">
			<div class="img-left">
				<img src="../../images/img23.jpg" />
			</div>
			<div class="information-right scroll-animation" data-animation="fadeInLeft" data-animation-delay="0s">
				<h3>对您有什么帮助?</h3>
				<p>主要针对有长期统计需求的人员。</p>
				<!-- <a href="blog_inner.html" class="read-more">read more</a> -->
			</div>
		</section>
    </div>
</template>

<script>
	export default {
		created() {
			this.$store.dispatch( 'loadCafes' );
        },
        /**
		 * 定义组件的计算属性
		*/
		computed: {
		    // 获取 cafes 加载状态
		    cafesLoadStatus(){
		        return this.$store.getters.getCafesLoadStatus;
		    },

		    // 获取 cafes
		    cafes(){
		        return this.$store.getters.getCafes;
		    }
		}
	}
</script>