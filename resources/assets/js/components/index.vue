<template>
  <div class="th-page">
    <div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">内容管理系统</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" :class="{ active: active == 'home'}" @click="routerChange('home')">文章列表</a>
            <a class="nav-item nav-link" :class="{ active: active == 'edit'}" @click="routerChange('edit')">新增文章</a>
          </div>
        </div>
      </nav>
    </div>
    <div>
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">内容管理系统</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ activeCn }}</li>
          </ol>
        </nav>
      </div>
      <div class="content">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        active: 'home',
        activeCn: '文章列表'
      }
    },
    mounted() {
      console.log('Component mounted.')
    },
    methods: {
      routerChange(active) {
        this.active = active
        switch(active) {
          case 'home':
            this.activeCn = '文章列表'
            this.$router.push('/')
            break;
          case 'edit':
            this.activeCn = '文章编辑'
            this.$router.push('/edit')
            break;
        }
      }
    }
  }
</script>

<style scoped>
  .content {
    margin: 0 16px;
  }
</style>
