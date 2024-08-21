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
            <h1 class="name">
                プロジェクト名：{{ $project->name }}
            </h1>
            <div class="content">
                <div class="content__post">
                    <h3>音源：</h3>
                    @if($project->music_url)
                    <div>
                        <audio id=test_audio  controls src="{{ $project->music_url }}"/>
                    </div>
                    @endif
                </div>
            </div>
            <div class="edit">
                <a href="/projects/{{ $project->id }}/edit">編集</a>
            </div>
            <div class="footer">
                <a href="/dashboard">戻る</a>
            </div>
        <script>
            const audio = document.getElementById('test_audio');
            audio.addEventListener('timeupdate', () =>{
                console.log(audio.currentTime);
            });
        </script>
        </body>
    </x-app-layout>
    
</html>