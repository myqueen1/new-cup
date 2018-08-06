<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="/Public/backend/">
</head>
<body>
<form action="" method="post">
    <textarea name="goods_content" id="editor" cols="30" rows="10"></textarea>
    <input type="submit">
    <button onclick="getHtml()">获取HTML</button>
    <button onclick="getText()">获取纯文本</button>
</form>

</body>
</html>

<script src="HandyEditor-master/HandyEditor.min.js"></script>
<script>
    var he = HE.getEditor('editor', {
        width: '900px',
        height: '400px',
        autoHeight: true,
        autoFloat: false,
        topOffset: 0,
        uploadPhoto: true,
        uploadPhotoHandler: 'php/uploadPhoto.php',
        uploadPhotoSize: 0,
        uploadPhotoType: 'gif,png,jpg,jpeg',
        uploadPhotoSizeError: '不能上传大于××KB的图片',
        uploadPhotoTypeError: '只能上传gif,png,jpg,jpeg格式的图片',
        lang: 'zh-jian',
        skin: 'HandyEditor',
        externalSkin: '',
        item: ['bold', 'italic', 'strike', 'underline', 'fontSize', 'fontName', 'paragraph', 'color', 'backColor', '|', 'center', 'left', 'right', 'full', 'indent', 'outdent', '|', 'link', 'unlink', 'textBlock', 'code', 'selectAll', 'removeFormat', 'trash', '|', 'image', 'expression', 'subscript', 'superscript', 'horizontal', 'orderedList', 'unorderedList', '|', 'undo', 'redo', '|', 'html', '|', 'about']
    });

    he.getHtml();//获取HTML代码
    he.getText();//获取纯文本
</script>