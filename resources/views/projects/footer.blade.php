<div class=" p-2 bg-gray-50 flex justify-between content-center">

    <div class="flex">
        <div class="flex ml-3">
            <img src="{{asset("image/clock.svg")}}" width="15px" alt="">
            <span class="mr-2">{{ Carbon\Carbon::parse($project->created_at)->diffForHumans() }}</span>
        </div>
        <div class="flex">
            <img src="{{asset("image/tasks.svg")}}" width="15px" alt="">
            <span class="mr-2">{{count($project->tasks)}}</span>
        </div>
    </div>

        <form class="flex" action="/projects/{{$project->id}}" method="post">
            @method("DELETE")
            @csrf
                    <img onclick="submit()" role="button" class="cursor-pointer" src="{{asset("image/delete.svg")}}" class="mb-0" width="15px" alt="">
        </form>

</div>
