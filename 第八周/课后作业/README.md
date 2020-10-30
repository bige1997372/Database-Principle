### CAT小组需求文档（见文件）
### 将英文分词模块服务化，编写完整的中英文分词接口服务化模块
```
#!/usr/bin/python
# -*- coding: utf-8 -*-
print("content-type:text/html")
import jieba
from flask import Flask, request, jsonify
import requests, json

# business logic part

def cut(content):
    word_list = jieba.lcut(content)
    word_num = len(word_list)
    word_str = ",".join(word_list)
    return word_str, word_num

# flask part

toy = Flask(__name__) # create a Flask instance

@toy.route("/")
def index():
    return "Hello, World!"

# <string:content>定义输入的内容的类型及变量名，注意":"左右不能有空格，
@toy.route("/cut/para/<string:content>")
def paraCut(content):
    word_str, word_num = cut(content)
    return "words: {}; number of words: {}".format(word_str, word_num)

@toy.route("/cut/json/", methods=["POST"]) # methods可以是多个
def jsonCut():
    if request.method == "POST":
        # 从request请求中提取json内容
        json_dict = request.get_json()
        content = json_dict["content"]
        # 运行业务逻辑
        word_str, word_num = cut(content)
        # 将结果格式化为dict
        data = {"word_str": word_str, "word_num": word_num}
        return json.dumps(data) # 将data序列化为json类型的str    
    else:
        return """<html><body>
        Something went horribly wrong
        </body></html>"""

@toy.route("/test/post/")
def postTest():
    # 生成一个request请求，其中包含了请求对象、要处理的数据、数据类型
    url = "http://localhost:5000/cut/json/"
    data = {"content": "欢迎来到北京语言大学"}
    headers = {"Content-Type" : "application/json"}
    # 使用python自带的requests post方法发送请求
    r = requests.post(url, data=json.dumps(data), headers=headers)
    return r.text

if __name__ == "__main__":
    toy.run(debug=True)
```
#### 测试图
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E5%85%AB%E5%91%A8/%E8%AF%BE%E5%90%8E%E4%BD%9C%E4%B8%9A/api%E6%B5%8B%E8%AF%95.png)

#### 分词结果
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E5%85%AB%E5%91%A8/%E8%AF%BE%E5%90%8E%E4%BD%9C%E4%B8%9A/api%E5%88%86%E8%AF%8D.png)
