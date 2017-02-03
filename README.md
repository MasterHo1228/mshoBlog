# mshoBlog
A blog website,powered by Laravel~

Demo:http://masterho1228.xyz

##Required
PHP7,Redis,Node.js with npm,composer

##Installation
1. Clone源码到服务器环境路径内。
2. 在根目录内另存 `.env.example`文件为 `.env` 文件,接着根据实际的服务器环境编辑其中的参数。
3. (Unix)修改 `storage/` 目录的权限:`sudo chmod -R 777 storage/`
4. (Unix)修改 `public/uploads` 目录的权限:`sudo chmod -R 777 public/uploads/`
5. 在终端中运行以下命令：
```
npm install
composer install
php artisan key:generate
php artisan migrate --seed
npm run dev
```
6. 配置好Apache/nginx server config，具体配置可利用搜索引擎查找教程参考。
7. 开启重写模块：
    
    (Apache)开启rewrite模块;
    
    (nginx)可参考该贴子的配置：https://laravel-china.org/topics/492 
8. enjoy~

###P.S
1. **建议在Linux环境中部署使用。**
2. 默认管理员账户名:`admin@msho.app` 密码:`123456`
3. 页脚若需要显示网站备案号，则在`.env`文件中进行如下修改：
```
/.env
CN_ICP_ID= #Your website ICP ID
CN_ICP_DISPLAY=true #把false改为true
```
接着在终端输入下方的命令，刷新下config的缓存：
```
php artisan config:cache
```

最后刷新下网页，即可生效。

>已知该功能在Windows系统环境下不能正常使用，本人建议在Windows系统下安装Linux虚拟机部署使用。若确实需要在Windows实体环境下部署使用，则在项目中的`config/cn.php`文件中做如下配置即可。**（但请注意备份此文件的配置数据，未来升级时可能会造成配置数据丢失）**:
```
config/cn.php

'icp_id' => env('CN_ICP_ID','粤ICP备XXXXXX号(此处替换为当期网站的备案号)'),

'icp_display' => env('CN_ICP_DISPLAY',true), #左侧的false改为true
```

4. 若发现其他问题，可上报issue or Pull Request.Thanks!