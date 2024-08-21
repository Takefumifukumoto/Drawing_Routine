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

                <input type="submit" value="保存"/>
            </form>
            <div class="back">[<a href="/dashboard">back</a>]</div>
        </body>
    </x-app-layout>
    
</html>