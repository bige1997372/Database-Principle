### 为某一贴图设置函数，使网页内的图片放大
1. 为选中的图片设置id
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E4%B8%80%E5%91%A8/%E8%AF%BE%E5%A0%82%E4%BD%9C%E4%B8%9A/SharedScreenshot2.jpg)
2. 编写jQuery代码
```
$("#test").click(function(){
  $("img").animate({
    left:'250px',
    height:'+=150px',
    width:'+=150px'
  });
});
```
3.效果
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E4%B8%80%E5%91%A8/%E8%AF%BE%E5%A0%82%E4%BD%9C%E4%B8%9A/SharedScreenshot3.jpg)
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E4%B8%80%E5%91%A8/%E8%AF%BE%E5%A0%82%E4%BD%9C%E4%B8%9A/SharedScreenshot4.jpg)
### 隐藏显示标题

1. jQuery代码
```
$(".col-2 .section-header .section-title").hide();
$(".col-2 .section-header .section-title").show();
```
2. 效果
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E4%B8%80%E5%91%A8/%E8%AF%BE%E5%A0%82%E4%BD%9C%E4%B8%9A/SharedScreenshot5.jpg)
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E4%B8%80%E5%91%A8/%E8%AF%BE%E5%A0%82%E4%BD%9C%E4%B8%9A/SharedScreenshot6.jpg)
