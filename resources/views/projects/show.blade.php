@component('layouts.app')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$project->title}}
        </h2>
    </x-slot>
    <header class="flex justify-between mb-10">
        <div class="text-gray-500">
            <a href="/projects">مشاريعي / </a>{{ $project->title }}
        </div>



        <div>
            <a href="/projects/{{$project->id}}/edit" role="button"
                class="py-2 rounded px-4 bg-purple-600 text-white font-semibold   shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:ring-opacity-75">
                تعديل المشروع
            </a>
        </div>

    </header>

    <div class="grid grid-cols-3 gap-4">
        <div class="col-start-1 col-end-12  md:col-end-2">
            <div class="max-w-auto h-200 rounded bg-white overflow-hidden shadow-lg ">

                <div class="px-6 py-4">
                    <div class="status text-right">
                        @switch($project->status)
                            @case(1)
                                <span class="font-bold text-green-600">مكتمل</span>
                            @break

                            @case(2)
                                <span class="font-bold text-red-600">ملغي</span>
                            @break

                            @default
                                <span class="font-bold text-amber-500">قيد الإنجاز</span>
                        @endswitch
                    </div>
                    <div class="font-bold text-xl my-4"><a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                    </div>
                    <p class="text-gray-700 text-base card-mh">
                        {{ $project->description }}
                    </p>
                </div>

                <div class=" pt-4">
                    @include('projects.footer')
                </div>
            </div>

            <div class="max-w-auto h-200 rounded bg-white overflow-hidden shadow-lg mt-5">

                <div class="px-6 py-4">

                    <div class="font-bold text-xl my-4">تغيير حالة المشروع
                    </div>
                    <form class="inline-block relative w-64" action="/projects/{{ $project->id }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <select name="status" onchange="this.form.submit()"
                            class="block appearance-none w-full bg-white bg-none border border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow focus:outline-none focus:shadow-outline">
                            <option value="0" {{ $project->status == 0 ? 'selected' : '' }}>قيد الإنجاز</option>
                            <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>مكتمل</option>
                            <option value="2" {{ $project->status == 2 ? 'selected' : '' }}>ملغي</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </form>
                </div>

            </div>

        </div>

        <div class="col-start-1 md:col-start-2 col-end-12 sm:col-end-12">

            @foreach ($project->tasks as $task)
                <div
                    class="flex flex-wrap justify-between items-center bg-white border-b border-purple-500 py-2 mb-2 task-body">
                    <div
                        class="appearance-none max-w-lg bg-transparent border-none
                         mr-3 py-1 px-2 leading-tight{{ $task->done ? ' line-through text-gray-400' : '' }}">
                        {{ $task->body }}
                    </div>
                    <div class="flex items-center">

                        <form action="/projects/{{ $project->id }}/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" name="done" onchange="this.form.submit()"
                                {{ $task->done ? 'checked' : '' }}
                                class="rounded text-purple-500 task-done focus:outline-none" />

                        </form>
                        <form action="/projects/{{ $project->id }}/tasks/{{ $task->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button
                                class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded"
                                type="submit">
                                <img src="{{ asset('image/delete.svg') }}" width=15px alt="">
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            </form>




            <form class="w-full max-w-auto" action="/projects/{{ $project->id }}/tasks" method="POST">
                @csrf
                <div class="flex items-center bg-white border-b border-teal-500 py-2 add-task">
                    <input
                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:shadow-none focus:outline-none"
                        type="text" name="body" placeholder="أضف مهمة جديدة">
                    <button
                        class="flex-shrink-0 rounded bg-purple-600 ml-4 hover:bg-purple-700 text-sm text-white py-1 px-2 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:ring-opacity-75"
                        type="submit">
                        إضافة
                    </button>

                </div>
            </form>
        </div>
    </div>
@endcomponent
