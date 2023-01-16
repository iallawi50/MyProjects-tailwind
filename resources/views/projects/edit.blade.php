@section('title', $project->title)

@component('layouts.app')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>
    <header class="flex justify-between mb-10">
        <div class="text-gray-500">
            <a href="/projects">مشاريعي / </a>{{$project->title}}
        </div>




    </header>

    <div class="w-full max-w-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-2xl font-bold text-center mb-10">تعديل المشروع</h1>
        <form class="" action="/projects/{{$project->id}}" method="POST">
            @method("PATCH")
            @csrf
            @include('projects.form')
            <div class="flex items-center justify-between">
                <button
                    class="py-2 rounded px-4 bg-purple-600 text-white font-semibold   shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:ring-opacity-75"
                    type="submit">
                    تعديل المشروع
                </button>

            </div>

        </form>
    </div>
@endcomponent
