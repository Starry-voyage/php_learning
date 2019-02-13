注意:
   <br>用户应用写在index.php的APP_PATH定义文件里面</br>
   <br>控制器名称必须以Controller为后缀
   <br>然后就可以在浏览器输入 www.your-website.com/home/index/index 就是访问apply底下的Home模块下的IndexController下的index方法  
   <br>www.your-website.com/index/index 而只有两个时，访问的是默认模块下面的IndexController下的index方法   
   <br>当只有一个时 www.your-website.com/index 访问的是默认模块默认控制器下的index方法。。都没有时，默认模块默认控制器默认方法。
   <br>目前默认模块为Hone，默认控制器为Index，默认方法为Index
<br>目前错误处理已经实现了一大半了，下一步实现关闭调试模式的处理以及 模板引擎的加入
   