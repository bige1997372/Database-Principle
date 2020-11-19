#### 文档处理（word,excel,ppt）模块服务化程序
```
# coding:utf-8

import os, json
from docx import Document
import xlrd
from pptx import Presentation
import pdfplumber

class WordParser:
    def __init__(self):
        pass

    def parse(self, pth_doc):
        _doc = []
        document = Document(pth_doc)  #打开文件demo.docx
        for paragraph in document.paragraphs:
            _doc.append(paragraph.text)
        return _doc

class ExcelParser:
    def __init__(self):
        pass

    def parse(self, pth_doc):
        #文件名以及路径，如果路径或者文件名有中文给前面加一个表示原生字符。
        book = xlrd.open_workbook(pth_doc)
        table = book.sheets()[0]

        nrows = table.nrows
        ncols = table.ncols

        _doc = []
        for row in nrows:
            vcols = [str(table.cell_value(row,col)) for col in ncols ]
            _doc.append(', '.join(vcols))
        return _doc

class PPTParser:
    def __init__(self):
        pass

    def parse(self, pth_doc):
        prs = Presentation(pth_doc)

        _doc = []

        for slide in prs.slides:
            for shape in slide.shapes:
                if not shape.has_text_frame:
                    continue
                for paragraph in shape.text_frame.paragraphs:
                    for run in paragraph.runs:
                        _doc.append(run.text)
        return _doc

class PDFParser:
    def __init__(self):
        pass

    def parse(self, pth_doc):
        pdf_plumber = pdfplumber.open(pth_doc)
        # pdf_camelot = camelot.read_pdf(self.doc_pth, pages='', flavor='stream')
        _pages = pdf_plumber.pages

        _doc = []
        for num_page, _page in enumerate(_pages):
            text_page = ''
            try:
                text_page = _page.extract_text()
                _doc.append(text_page)
            except Exception as e:
                print(e)
        return _doc
                


class DocumentParser:
    def __init__(self):
        self._parser_word= WordParser()
        self._parser_excel=ExcelParser()
        self._parser_ppt=PPTParser()
        self._parser_pdf=PDFParser()
        self.parsers = {
            'docx': self._parser_word,
            'xlsx': self._parser_excel,
            'pptx': self._parser_ppt,
            'pdf': self._parser_pdf
        }

    def parse(self, pth_doc, _type):
        file_name = os.path.basename(pth_doc)
        _, ext = os.path.splitext(file_name)
        __type = ext[1:]

        _doc = self.parsers[_type].parse(pth_doc)
        return _doc
        

```
