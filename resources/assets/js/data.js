import axios from 'axios'

// Set X-CSRF_TOCKEN For Laravel CSRF
axios.defaults.headers.common = {
	'X-CSRF-TOKEN': window.Laravel.csrfToken
}

let num = '123456'

let urls = {
	articleList: '/article/list/'+num+'/',
	articleDetail: '/article/detail/'+num+'/',
	articlePost: '/article/save/'+num,
}

export default {
	get(cate, param) {
		if (!param) {
			param = ''
		}
		return new Promise(function(resolve) {
			axios.get(urls[cate] + param)
				.then(function (response) {
					resolve(response.data)
				})
				.catch(function(error) {
					resolve('err')
				})
		})
	},
	post(cate, data, param) {
		if (!param) {
			param = ''
		}
		return new Promise(function(resolve) {
			axios.post(urls[cate] + param, data)
				.then(function (response) {
					resolve(response.data)
				})
				.catch(function(error) {
					resolve('err')
				})
		})
	},
}