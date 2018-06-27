# 用户
## 注册

登陆 [https://webblog.yolostudio.cn/register](https://webblog.yolostudio.cn/register) 注册账号，填写正确的邮箱及学号。

## 登陆

**简要描述：**

- 用户登陆接口

**请求URL：** 
- ` https://webblog.yolostudio.cn/oauth/token `

**请求方式：**
- POST

**参数：**

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |-----   |
|grant_type |是  |string |password | 原样填写 |
|client_id |是  |string | 3  | 原样填写 |
|client_secret     |否  |string | he8rtcU6ceFlmiyf6fCilHfFaNyQkNLzfQPAw8KA  | 原样填写 |
|username |是  |string |xxx@xxx.xxx   | 用户邮箱 |
|password |是  |string | xxx | 密码 |
|scope |是  |string |     | 空字符串 |

 **返回示例**

``` 
  {
    "token_type": "Bearer",
    "expires_in": 31536000,
    "access_token": "xxxxxx",
    "refresh_token": "xxxxxx"
}
```

 **备注**

- access_token用于后续列表，详情，新增等请求，将`Bearer` `空格` `access_token`加入请求的header中即可。

## 用户信息

**简要描述：** 

- 获取用户信息接口

**请求URL：** 
- ` https://webblog.yolostudio.cn/api/user `
  
**请求方式：**
- GET

**Header 参数：** 

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |
|Authorization |是  |string |Bearer空格access_token|Bearer与access_token之间有个空格|

 **返回示例**

```
  {
    "id": 1,
    "name": "xxx",
    "email": "xxx@xxx.xxx",
    "number": "1234567890",
    "created_at": "2018-06-27 07:49:05",
    "updated_at": "2018-06-27 07:49:05"
}
```

# 文章
## 新增

**简要描述：** 

- 新增文章接口

**请求URL：** 
- ` https://webblog.yolostudio.cn/api/article/save `
  
**请求方式：**
- POST 

**Header 参数：** 

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |-----   |
|Authorization |是  |string |Bearer空格access_token|Bearer与access_token之间有个空格|

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|title |是  |string |标题   |
|cover |是  |string | 封面    |
|tags     |是  |string | tag, json数组形式, 若无就是空数组, 若有, 值为tag id  |
|content     |是  |string | 昵称    |

 **返回示例**

``` 
  {
      "status": true
  }
```

## 修改

**简要描述：** 

- 修改文章接口

**请求URL：** 
- ` https://webblog.yolostudio.cn/api/article/save `
  
**请求方式：**
- POST 

**Header 参数：** 

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |
|Authorization |是  |string |Bearer空格access_token|Bearer与access_token之间有个空格|

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|id |是  |string |文章id   |
|title |是  |string |标题   |
|cover |是  |string | 封面    |
|tags     |是  |string | tag, json数组形式, 若无就是空数组, 若有, 值为tag id  |
|content     |是  |string | 昵称    |

 **返回示例**

``` 
  {
      "status": true
  }
```

## 列表
  
**简要描述：** 

- 文章列表接口

**请求URL：** 
- ` https://webblog.yolostudio.cn/api/article/list/{page} `
  
**请求方式：**
- GET 

**Header 参数：** 

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |
|Authorization |是  |string |Bearer空格access_token|Bearer与access_token之间有个空格|

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|page |是  |string |第N页 |

 **返回示例**

``` 
{
    "data": [
        {
            "id": 1,
            "tags": [],
            "number": "000",
            "cover": "6xTzQ97XeTkpCaJJ",
            "title": "s9m54EBx",
            "author": "Default",
            "content": "jcXuS93yyhc3BF2D4viscOujYSHZKQxsq4v8ASRNqwX7IsjDnwiZpyGgY989bCWH9B7LfSnSp01m2833",
            "created_at": null,
            "updated_at": null,
            "status": "passed"
        },
        {
            "id": 2,
            "tags": [],
            "number": "000",
            "cover": "YqCjc7N0W6guJSHn",
            "title": "3UWGsHnX",
            "author": "Default",
            "content": "LGgoggXTI79IZgJnKX7gO1H89lKeo9Mv3RLCJOljs9IUlCG6tL1jmv5wVZvFERqUGjSMociOsqIahK3U",
            "created_at": null,
            "updated_at": null,
            "status": "passed"
        },
        {
            "id": 3,
            "tags": {
                "1": "abc",
                "2": "b",
                "3": "c"
            },
            "number": "1234567890",
            "cover": "ccc",
            "title": "abc",
            "author": "xxx",
            "content": "123qwe",
            "created_at": "2018-06-27 08:15:14",
            "updated_at": "2018-06-27 08:15:14",
            "status": "passed"
        },
        {
            "id": 5,
            "tags": {
                "1": "abc",
                "2": "b",
                "3": "c"
            },
            "number": "1234567890",
            "cover": "ccc",
            "title": "abc",
            "author": "xxx",
            "content": "123qwe",
            "created_at": "2018-06-27 08:25:21",
            "updated_at": "2018-06-27 08:25:21",
            "status": "passed"
        }
    ],
    "pageNum": 1
}
```

## 详情
  
**简要描述：** 

- 文章详情接口

**请求URL：** 
- ` https://webblog.yolostudio.cn/api/article/detail/{id} `
  
**请求方式：**
- GET 

**Header 参数：** 

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |
|Authorization |是  |string |Bearer空格access_token|Bearer与access_token之间有个空格|

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|id |是  |int |文章id |

 **返回示例**

``` 
{
    "data": {
        "id": 3,
        "tags": {
            "1": "abc",
            "2": "b",
            "3": "c"
        },
        "number": "1234567890",
        "cover": "ccc",
        "title": "abc",
        "author": "xxx",
        "content": "123qwe",
        "created_at": "2018-06-27 08:15:14",
        "updated_at": "2018-06-27 08:15:14",
        "status": "passed"
    }
}
```

## 删除

**简要描述：** 

- 删除文章接口

**请求URL：** 
- ` https://webblog.yolostudio.cn/api/article/delete `
  
**请求方式：**
- POST 

**Header 参数：** 

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |
|Authorization |是  |string |Bearer空格access_token|Bearer与access_token之间有个空格|

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|id |是  |string |文章id   |

 **返回示例**

``` 
  {
      "status": true
  }
```

# 标签
## 新增

**简要描述：** 

- 新增标签接口

**请求URL：** 
- ` https://webblog.yolostudio.cn/api/tags/save `
  
**请求方式：**
- POST 

**Header 参数：** 

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |
|Authorization |是  |string |Bearer空格access_token|Bearer与access_token之间有个空格|

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|name |是  |string |标题   |
|cover |是  |string | 封面    |
|description     |是  |string | 标签描述 |

 **返回示例**

``` 
  {
      "status": true
  }
```

## 修改

**简要描述：** 

- 修改标签接口

**请求URL：** 
- ` https://webblog.yolostudio.cn/api/tags/save `
  
**请求方式：**
- POST 

**Header 参数：** 

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |
|Authorization |是  |string |Bearer空格access_token|Bearer与access_token之间有个空格|

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|id |是  |int |tag id   |
|name |是  |string |标题   |
|cover |是  |string | 封面    |
|description     |是  |string | 标签描述 |

 **返回示例**

``` 
  {
      "status": true
  }
```

## 列表

**简要描述：** 

- 标签列表接口

**请求URL：** 
- ` https://webblog.yolostudio.cn/api/tags/list`

**请求方式：**
- GET

**Header 参数：**

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |
|Authorization |是  |string |Bearer空格access_token|Bearer与access_token之间有个空格|


 **返回示例**

```
{
    "data": [
        {
            "id": 1,
            "number": "1234567890",
            "creator": 1,
            "name": "abc",
            "cover": "abcaaa",
            "description": "abcabc",
            "created_at": "2018-06-27 08:41:18",
            "updated_at": "2018-06-27 08:41:18",
            "status": "passed"
        },
        {
            "id": 2,
            "number": "1234567890",
            "creator": 1,
            "name": "b",
            "cover": "b",
            "description": "b",
            "created_at": "2018-06-27 08:41:27",
            "updated_at": "2018-06-27 08:41:27",
            "status": "passed"
        },
        {
            "id": 3,
            "number": "1234567890",
            "creator": 1,
            "name": "c",
            "cover": "c",
            "description": "cccc",
            "created_at": "2018-06-27 08:41:33",
            "updated_at": "2018-06-27 08:44:10",
            "status": "passed"
        }
    ]
}
```

## 删除

**简要描述：**

- 删除文章接口

**请求URL：**
- ` https://webblog.yolostudio.cn/api/tags/delete `

**请求方式：**
- POST

**Header 参数：**

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |
|Authorization |是  |string |Bearer空格access_token|Bearer与access_token之间有个空格|

**参数：**

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|id |是  |string |tag id   |

 **返回示例**

```
  {
      "status": true
  }
```

# 文件
## 上传

**简要描述：** 

- 新增标签接口

**请求URL：** 
- ` https://webblog.yolostudio.cn/api/file/upload `

**请求方式：**
- POST

**Header 参数：**

|参数名|必选|类型|值|说明|
|:----    |:---|:----- |-----   |
|Authorization |是  |string |Bearer空格access_token|Bearer与access_token之间有个空格|

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|file |是  |file |图片(小于2MB)   |

 **返回示例**

``` 
  {
    "data": "https://webblog.yolostudio.cn/storage/9iafBY7AAkQigbZj3X2mZZynJXBFy0dykSobzpGT.jpeg",
    "status": "success"
}
```