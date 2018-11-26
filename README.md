# Emlog后台模版YEadmin

#### 项目介绍
首先感谢你选择Y+Eadmin，该模版为开源EMlog使用的后台模版

历时一周多一点，终于Y+Eadmin后台模版制作完毕了，很早就有这个想法的，但是苦于其他事情，所以一直搁置下来了。

写这款后台模版，让我对Emlog的后台运作有了一定的了解，参考N+模版进行各种代码移植，样式编写，反反复复，不断打磨，成功造就这款精美的后台模版。

写代码的乐趣就在于不断挑战，不断测试，不断找到新的成功，甚至为了一个很小的功能连续测试上百次，最后成功的哪种喜悦。好了，废话不多说了，开始介绍我这一周多的成果吧。

Y+Eadmin是基于bootstrap开源模版coco进行底层适配的，整个模版参考N+模版进行全局设计及代码修整，目前适用于Emlog5.3.x版本的后台使用。 该模版中使用了非常多的开源项目：

	BootStrap
	Jquery
	Ckeditor
	等等……

感谢这些优秀的开源项目，否则就没有现在的Y+Eadmin。

#### 特性
基于bootstrap为底层的自适应模版，在多设备上的效果体验都是极佳的，方便Emloger的后台操作。
支持双编辑器，其中包含Ckeditor以及原生的editor，能带给你更好的写作体验。
使用notifyjs插件能给你友好的提醒体验。
微语使用Html5上传图片，解决手机不能传图的尴尬
#### 安装教程
下载压缩包，上传到admin目录下直接解压即可(需要覆盖原文件)
如果需要模版设置，必须安装指定的模版设置插件，已集成在压缩包中，可直接上传安装
#### 使用帮助
1. 修改编辑器
修改路径/y/header.php文件 第四行 $editType 变量

	0 -> 原生editor
	1 -> 多功能的Ckeditor

2. 修改后台公告
后台侧边栏公告修改路径/y/header.php文件第6六行 $Notice 变量

3. 插件插入图片、内容、附件等等插入失败

因为各个编辑器生成的class、id都是不同的，插件作者一般都会写死插入class、id属性，所以才会导致插入失败，解决只能从插件处修改对应class、id。小杰给大家提供一下关于Ckeditor编辑器的数据新增、插入、获取方法方便大家修改Bug
 
	获取内容
	 CKEDITOR.instances.content.getData();
	设置内容
	 CKEDITOR.instances.content.setData( 'This is the editor data.' );
	插入内容
	 CKEDITOR.instances.content.insertHtml("新内容");
	 
#### 常见问题
1. 由于emlog机制问题，新建一篇文章时不会产生文章logid，在选择上传插入附件时，或在浏览附件库时都会提示权限不足，emlog的机制为自动js触发保存才会生成logid到页面id，之后才能对附件进行操作。这个是我在写后台时遇到的最大的问题。
2. 关于模版设置，由于官方的模版设置插件和模版的class、id有一定出入，所以不会出现设置按钮，必须安装指定模版设置插件，才能正常使用
3. 由于Ckeditor不支持安卓手机的特性，所以小杰尝试修改了Ckeditor的核心代码，如果你在写作中出现异常情况，请联系小杰。
4. 由于emlog官方核心文件与模版功能有一定的出入，所以Y+Eadmin修改了emlog后台三个核心文件，如果不覆盖这三个文件，该模版将无法正常使用

	`globals.php`	修改模版路径以及官方服务域名为https
	`store.php`	修复在线安装失败的bug
	`template.php`	增加更多主题信息输出

#### 项目地址
###### Blog：https://www.youngxj.cn/552.html
###### Gitee：https://gitee.com/youngxj0/emlog-Y_Eadmin
###### GitHub：https://github.com/Youngxj/emlog-Y_Eadmin