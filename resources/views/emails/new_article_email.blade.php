<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body style="background-color: #7da8c3">
<div>
    <p>Привет, {{$userName}}! В блоге опубликовали новую статью:
        <a href="http://dka-blog.test/blog/article/{{$article->slug}}"><b>{{$article->title}}</b></a>
        В категориях: {{$article->categories()->pluck('title')->implode(', ')}}. Может быть, вам будет интересно!
    </p>
    <p>{{$article->description_short}}</p>
</div>
</body>
</html>
