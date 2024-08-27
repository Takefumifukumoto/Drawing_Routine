<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            　Create
        </x-slot>
        <body>
            <form action="/projects" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="name">
                    <h2>プロジェクト名：</h2>
                    <input type="text" name="project[name]" value="{{ old('project.name') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('project[name]') }}</p>
                </div>
                <div class="music">
                    <h2>音源：</h2>
                    <input type="file" name="music" value="{{ old('music') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('music') }}</p>
                </div>
                <input type="submit" value="保存"/>
            </form>
            <div class="back">[<a href="/dashboard">back</a>]</div>
        </body>
    </x-app-layout>
    
</html>