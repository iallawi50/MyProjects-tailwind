<img width="45px" src="
@auth
    {{ asset("storage/".auth()->user()->image)}}
@endauth
@guest
{{ asset("users/default.png")}}
@endguest

" class="rounded-full" alt="">

