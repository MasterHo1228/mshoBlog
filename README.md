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
6.最后在终端中运行`php artisan serve`即可。

###For production environment
1. 配置好Apache/nginx server config，具体配置可利用搜索引擎查找教程参考。
2. 开启重写模块：
    
    (Apache)开启rewrite模块;
    
    (nginx)可参考该贴子的配置：https://laravel-china.org/topics/492 
3. enjoy~

###P.S
默认管理员账户名:admin@msho.app

密码:123456