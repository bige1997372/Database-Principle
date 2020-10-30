### 制作中英文双语数据10对,使用jieba将上述数据进行分词。
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E5%85%AB%E5%91%A8/%E8%AF%BE%E5%A0%82%E4%BD%9C%E4%B8%9A/jieba%E4%B8%AD%E6%96%87.png)
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E5%85%AB%E5%91%A8/%E8%AF%BE%E5%A0%82%E4%BD%9C%E4%B8%9A/jieba%E8%8B%B1%E6%96%87.jpg)

### 创建自定义用户词典,使用加载自定义用户词典后的分词器对数据再进行分词。
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E5%85%AB%E5%91%A8/%E8%AF%BE%E5%A0%82%E4%BD%9C%E4%B8%9A/jieba%E8%87%AA%E5%AE%9A%E4%B9%89%E8%AF%8D%E5%85%B8.png)

### NLTK分词
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E5%85%AB%E5%91%A8/%E8%AF%BE%E5%A0%82%E4%BD%9C%E4%B8%9A/nltk.png)
```
import nltk
from nltk.tokenize import word_tokenize
from nltk.tokenize import MWETokenizer

f2 = open("en_tokenize_test.txt", "r",encoding='UTF-8')

tokenizer=MWETokenizer([('in','spite','of'),('a','lot','of')],separator='_')

def preprocess(sent):
    sent = tokenizer.tokenize(nltk.word_tokenize(sent))
    #sent = nltk.word_tokenize(sent)
    return sent

for line in f2.readlines():
    line=line.strip()
    word_list=preprocess(line)
    print(word_list,"\n")

```
en_tokenize_test.txt在文件中
