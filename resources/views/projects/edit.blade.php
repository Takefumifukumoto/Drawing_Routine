<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            　Create
        </x-slot>
        <body>
            <form action="/projects" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="name">
                    <h2>プロジェクト名</h2>
                    <input type="text" name="project[name]" value="{{ $project->name }}"/>
                    <!--<p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>-->
                </div>
                <div class="music">
                    <h2>音源：</h2>
                    <!--<input type="file" name="music" value="{{'project.music_url'}}"/>-->
                    <!--<p class="title__error" style="color:red">{{ $errors->first('music') }}</p>-->
                    @if($project->music_url)
                    <div>
                        <audio id=test_audio  controls src="{{ $project->music_url }}"/>
                    </div>
                    @endif
                </div>
                
                
                <input type="submit" value="保存"/>
            </form>
            
            <form action="/scenes" method="POST" id=scene_form>
                @csrf
                <div class="scenes">
                    <div class="scene_add">
                        <input type=hidden name=project_id value={{ $project->id }}></input>
                        <input type=hidden name=time id=audio></input>
                    <button type="submit">現在の再生時間でシーンを作成</button>
                    </div>
                </div>
            
            <div class="back">[<a href="/dashboard">back</a>]</div>
            
            <script>
                const audio = document.getElementById('test_audio');
                const scene_form = document.getElementById('scene_form');
                scene_form.addEventListener('submit', () =>{
                    const input_audio = document.getElementById('audio');
                    input_audio.value = audio.currentTime;
                });
            </script>
        </body>
    </x-app-layout>
    
</html>