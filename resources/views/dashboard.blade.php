<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <h1>作成したプロジェクト</h1>
    <div class='projects'>
        @foreach ($created_projects as $created_project)
            <div class='project'>
                <h2 class='name'>
                    <a href="/projects/{{ $created_project->id }}">{{ $created_project->name }}</a>
                </h2>
            </div>
        @endforeach
    </div>
    
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
