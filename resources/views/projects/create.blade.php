<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create</title>
    </head>
    <body>
        <h1>Drawing Routine</h1>
        <form action="/projects" method="POST">
            @csrf
            <div class="name">
                <h2>プロジェクト名：</h2>
                <input type="text" name="project[name]" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="music">
                <h2>音源：</h2>
                <input type="text" name="project[music]" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>            
            <div class="body">
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>