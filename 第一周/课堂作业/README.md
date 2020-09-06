### 为某一贴图设置函数，使网页内的图片放大
1. 为选中的图片设置id
![image]()
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
![image]()

### 隐藏显示标题

1. jQuery代码
```
$(".col-2 .section-header .section-title").hide();
$(".col-2 .section-header .section-title").show();
```
2. 效果
![image]()
![image]()
