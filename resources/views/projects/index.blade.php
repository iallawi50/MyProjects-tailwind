@component('layouts.app')
@section('title', 'الرئيسية')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>
    <header class="flex justify-between mb-10">
        <div class="text-gray-500">
            <a href="/projects">مشاريعي</a>
        </div>


        <div>
            <a href="/projects/create" role="button"
                class="py-2 px-4 bg-purple-600 text-white font-semibold rounded shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:ring-opacity-75">اضف
                مشروع</a>
        </div>

    </header>


    <section>
        @if (count($projects) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @endif
        @forelse($projects as $project)
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
                        {{ Str::limit($project->description, 150) }}
                    </p>
                </div>

                                <div class=" pt-4">
                    @include('projects.footer')
                </div>
            </div>

            @empty
                <div class="text-center">
                    <p class="my-14 font-bold">لوحة العمل خالية من المشاريع</p>
                    <a href="/projects/create" role="button"
                        class="py-2  px-4 bg-purple-600 text-white font-semibold   shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:ring-opacity-75">
                        أنشئ مشروعاً جديداً الآن
                        </a>
                </div>
             @endforelse

            @if (count($projects) > 0)
                </div>
            @endif
        </section>
    @endcomponent
