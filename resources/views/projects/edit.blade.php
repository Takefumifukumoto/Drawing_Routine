<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            　Edit
        </x-slot>
        <body>
            <form action="/projects" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="name">
                    <h2>プロジェクト名</h2>
                </div>
                <div class="music">
                    <h2>音源：</h2>
                    @if($project->music_url)
                    <div>
                        <audio id=test_audio  controls src="{{ $project->music_url }}"/>
                    </div>
                    @endif
                </div>
                
                <div class="scenes">
                    <div class="current_scene">
                        <img id="current_image">
                        <p id="current_open_comment"></p>
                    </div>
                </div>
                
                <input type="submit" value="保存"/>
            </form>
            
            <form action="/scenes" method="POST" id=scene_form>
                @csrf
                
                <div class="scene_add">
                    <input type=hidden name=project_id value={{ $project->id }}></input>
                    <input type=hidden name=time id=audio></input>
                    <button type="submit">シーンを作成</button>
                </div>
                
            
            <div class="back">[<a href="/dashboard">back</a>]</div>
            
            <script>
                const audio = document.getElementById('test_audio');
                const scene_form = document.getElementById('scene_form');
                const current_image = document.getElementById('current_image');
                scene_form.addEventListener('submit', () =>{
                    const input_audio = document.getElementById('audio');
                    input_audio.value = audio.currentTime;
                });
                audio.addEventListener('timeupdate', () =>{
                    const scenes = @json($scenes);
                    var image;
                    var open_comment;
                    scenes.some(function(scene){
                        if(scene.time <= audio.currentTime){
                        image = scene.image_url;
                        open_comment = scene.open_comment;
                        } else {
                        document.getElementById('current_image').src = image;
                        document.getElementById('current_open_comment').textContent = "公開コメント：" + open_comment;
                        console.log(scene);
                        return true;
                        }
                    })
                });
            </script>
        </body>
    </x-app-layout>
    
</html>