<template>
	<div class="th-table-area">
		<div>
			<table class="table table-hover table-responsive">
			  <thead>
			    <tr>
			      <th scope="col">#ID</th>
			      <th scope="col">标题</th>
			      <th scope="col">作者</th>
			      <th scope="col">内容</th>
			      <th scope="col">操作</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<template v-for="(item, key) in lists">
			  		<tr>
				      <th scope="row">{{item.id}}</th>
				      <td>{{item.title}}</td>
				      <td>{{item.author}}</td>
				      <td class="text-content">{{item.content}}</td>
				      <td>
				      	<button type="button" class="btn btn-outline-primary btn-sm" @click="$router.push('/edit/'+item.id)">编辑</button>
				      </td>
				    </tr>
			  	</template>
			  </tbody>
			</table>
		</div>
		<div class="th-pagination">
			<nav aria-label="Page navigation example">
			  <ul class="pagination">
			    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item"><a class="page-link" href="#">2</a></li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item"><a class="page-link" href="#">Next</a></li>
			  </ul>
			</nav>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				lists: [],
				page: 1,
			}
		},
		watch: {
			'$route': 'pageInit'
		},
    mounted() {
      console.log('Component mounted.')
      this.pageInit()
    },
    methods: {
    	pageInit() {
    		this.getData()
    	},
    	getData() {
    		this.$http.get('articleList', this.page).then(res => {
    			this.lists = res.data
    			console.log(this.lists)
    		})
    	}
    }
  }
</script>

<style scoped>
	.th-pagination {
		display: flex;
		flex-direction: row-reverse;
	}
	.text-content {
		text-overflow:ellipsis;
		white-space: nowrap;
		overflow:hidden;
	}
	.th-table-area {
		display: flex;
		flex-direction: column;
		align-items: center;
	}
</style>