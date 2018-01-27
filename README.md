# DirectoryLister

### 特点：

我之所以使用Directory Lister，就是因为这个程序非常的简洁，符合我心中对 目录列表程序的定义，在使用期间，根据我个人喜好和审美做了一些改变。
- 界面式样魔改
- 支持中文目录和文件名
- 支持显示各文件夹内的简介说明
- 默认调用的各种CDN文件本地化
- 等等 ...

### 下载安装：

下载压缩文件后，解压并上传到已经搭建好 PHP和HTTP环境的服务器中（lnmp.org），然后即可上传文件和创建文件夹了！

链接：https://pan.baidu.com/s/1bqkpi6z 密码：hw2s


#### 文件结构
假设你的虚拟主机是 `/home/wwwroot/xxx.xx`
``` bash
/home/wwwroot/xxx.xx
├─ resources
│   ├ themes
│   │ └ bootstrap
│   │    └ .....
│   │
│   ├ DirectoryLister.php
│   ├ config.php
│   └ fileTypes.php
│
├ README.html # 文件夹内的 说明简介文件 #
├ index.php
│
├─ 测试文件夹
│   ├ 测试文件.txt
│   └ README.html # 文件夹内的 说明简介文件 #
│
└ 测试文件.txt
```
### 注意事项：

#### 不显示文件和目录

如果安装 lnmp一键包上传Directory Lister后，Directory Lister不显示文件和目录，那么可能是 PHP函数` scandir `被禁用了，取消禁用即可。
``` bash
sed -i 's/,scandir//g' /usr/local/php/etc/php.ini
# 取消scandir函数禁用
/etc/init.d/php-fpm restart
# 重启 PHP生效
```

#### 简介功能说明

我也不知道该给这个功能起什么名字，好捉急偶。

使用这个功能，需要打开` resources\themes\bootstrap\index.php `文件，找到第五行的：
``` bash
$md_path = explode("com", $md_path_all);
```
把` com `改成你的域名后缀(比如` xxx.cn `就是改成` cn `)，当初只是自用，现在一公开开源，我给忘了。

反正就是每个文件夹下面放一个` README.html `文件，这个文件里写着 简介说明内容即可。

为了避免中文乱码，把` README.html `文件用 UTF-8无BOM编码 保存！

#### 文件修改说明

修改网站中头部导航标题，去这个文件里搜索` rm rf 97 `然后全部替换为自己要改的。

` \resources\DirectoryLister.php `

修改网站标签栏的标题，去这个文件里把开头` <title> `标签中的` rm rf 97 `替换为自己要改的。

` \resources\themes\bootstrap\index.php `

网站头部公共文件：

` \resources\themes\bootstrap\default_header.php `

网站底部公共文件：

` \resources\themes\bootstrap\default_footer.php `

如果想要插入流量统计代码，那只需要把代码写到 default_header.php 文件内即可。

弄到这边接下来就是优化了，假如想像这位大佬这样下面带文字说明的下面就需要改代码了。

示例：https://softs.fun

接下里就需要改你安装目录下的resource/themes/bootstrap/index.php

通过HTML代码，我自己捣鼓出，应该在文件的119-125行里面添加东西，然后我已经打包好了，直接去修改就行。

最后感谢 下面的大佬的文章：https://doub.bid/dbrj-3/
