# mshoBlog
A blog website,powered by Laravel~

Demo:http://masterho1228.xyz

##Notice
1. 搭配PHP7食用，口味更佳~~
2. 务必安装Redis、node.js、composer、gulp，具体教程可利用搜索引擎查找。

##Installation
1. Clone源码到服务器环境路径内。
2. 在根目录内另存 `.env.example`文件，改名为 `.env` ,根据实际的服务器环境编辑其中的参数。
3. (Linux)修改 `storage/` 目录的权限:`sudo chmod -R 777 storage/`
4. (Linux)修改 `public/uploads` 目录的权限:`sudo chmod -R 777 public/uploads/`
5. 在终端中运行以下命令：
```
npm install
composer install
php artisan key:generate
php artisan migrate --seed
gulp
```
6. 配置好Apache/nginx server config，具体配置可利用搜索引擎查找教程参考。
7. 开启重写模块：
    
    (Apache)开启rewrite模块;
    
    (nginx)可参考该贴子的配置：https://laravel-china.org/topics/492 
8. enjoy~