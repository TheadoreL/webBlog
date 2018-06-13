<template>
	<div>
		<div v-if="success" class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>提交成功</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="success=false">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div v-if="fail" class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>提交失败</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="fail=false">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">标题</label>
		    <input type="text" class="form-control" v-model="content.title">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">作者</label>
		    <input type="text" class="form-control" v-model="content.author">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">内容</label>
		    <textarea class="form-control" rows="5" v-model="content.content"></textarea>
		  </div>
		  <button type="submit" class="btn btn-primary" @click="submit">Submit</button>
		</form>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				content: {
					title: '',
					author: '',
					content: ''
				},
				page: 1,
				success: false,
				fail: false,
			}
		},
		watch: {
			'$route': 'pageInit'
		},
    mounted() {
      this.pageInit()
    },
    methods: {
    	pageInit() {
    		this.getData()
    	},
    	getData() {
    		if (this.$route.params.id) {
    			this.$http.get('articleDetail', this.$route.params.id).then(res => {
	    			this.content = res.data
	    		})
    		}
    	},
    	submit() {
    		this.$http.post('articlePost', this.content).then(res => {
    			if (res.status) {
    				this.success = true
    			}
    			else {
    				this.fail = true
    			}
    		})
    	}
    }
  }
</script>