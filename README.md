# WebStack
WordPress 版 WebStack 主题     

项目在 [WordPress 版 WebStack 导航主题](https://github.com/owen0o0/WebStack) 的基础上进行了部分修改

可以通过访问 https://renserve.com 预览。

### 环境要求
+ WordPress 4.4+
+ WordPress 伪静态
+ PHP 5.7+ 7.0+

### 安装指南
+ 安装 WordPress ，教程百度
+ 设置伪静态
```
# Nginx规则
location /
{
    try_files $uri $uri/ /index.php?$args;
}
rewrite /wp-admin$ $scheme://$host$uri/ permanent;

# Apache 规则
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
```


### 参考项目
1) [WordPress 版 WebStack 导航主题](https://github.com/owen0o0/WebStack)   
2) [静态响应式网址导航网站](https://github.com/WebStackPage/WebStackPage.github.io)


