<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Scene Create</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            　Create
        </x-slot>
        <body>
            @if($project->music_url)
            <div>
                <audio id=test_audio  controls src="{{ $project->music_url }}"/>
            </div>
            @endif
            <form action="/scenes/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="project">
                    <input type="hidden" name="scene[project_id]" value={{ $project->id }}></input>
                </div>
            
                <div class="name">
                    <h2>シーン名：</h2>
                    <input type="text" name="scene[name]" value="{{ old('scene.name') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('scene.name') }}</p>
                </div>
                
                <div class="time">
                    <h2>時間：</h2>
                    <p id=time textContent=0></p>
                    <input type="hidden" name="scene[time]" value="0" id=audio />
                </div>
                
                <div class="image">
                    <h2>画像：</h2>
                    <input type="file" name="image" value="{{ old('scene.image_url') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('scene.image_url') }}</p>
                </div>
                
                <div class="comment">
                    <h2>コメント：</h2>
                    <textarea type="file" name="scene[comment]" rows="4" cols="50" value="{{ old('scene.image_url') }}"></textarea>
                    <p class="title__error" style="color:red">{{ $errors->first('scene.image_url') }}</p>
                </div>
                
                <div class="open_comment">
                    <h2>公開コメント：</h2>
                    <textarea type="file" name="scene[open_comment]" rows="4" cols="50" value="{{ old('scene.image_url') }}"></textarea>
                    <p class="title__error" style="color:red">{{ $errors->first('scene.image_url') }}</p>
                </div>      
                
                <input type="submit" value="保存"/>
            </form>
            
            <script>
                const audio = document.getElementById('test_audio');
                audio.addEventListener('timeupdate', () =>{
                    console.log(audio.currentTime),
                    m = (audio.currentTime / 60).toFixed()
                    s = String((audio.currentTime - 0.5).toFixed() % 60).padStart(2, '0');
                    document.getElementById('time').textContent = m + ":" + s;
                    document.getElementById('audio').value = audio.currentTime;
                });
            </script>
            <div class="back">[<a href="/dashboard">back</a>]</div>
        </body>
    </x-app-layout>
    
</html>