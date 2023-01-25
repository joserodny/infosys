<nav class="bg-gray-100"  x-data="{ open: false }">
    <div class="flex justify-between items-center bg-white py-6 lg:px-40 md:px-20 px-10">

            <ul :class="{ 'hidden': !open }" class="lg:flex hidden items-center space-x-10">
                @auth()
                   @if(auth()->user()->role == 1)
                        <li class="text-lg font-semibold hover:text-red-500 transition duration-200 cursor-pointer"><a href="/admin">Home</a></li>
                    @else
                        <li class="text-lg font-semibold hover:text-red-500 transition duration-200 cursor-pointer"><a href="/">Home</a></li>
                    @endif
                    <li class="text-lg font-semibold hover:text-red-500 transition duration-200 cursor-pointer"> {{ auth()->user()->name }}</li>
                        <form action="{{route('destroy')}}" method="POST">
                            @csrf
                            <button  type="submit">
                                <li class="text-lg font-semibold hover:text-red-500 transition duration-200 cursor-pointer">
                                        Logout
                                </li>
                            </button>
                        </form>
                @else
                    <li class="text-lg font-semibold hover:text-red-500 transition duration-200 cursor-pointer"><a href="/">Home</a></li>
                    <li class="text-lg font-semibold hover:text-red-500 transition duration-200 cursor-pointer"><a href="{{route('login')}}">Login</a></li>
                    <li class="text-lg font-semibold hover:text-red-500 transition duration-200 cursor-pointer"><a href="{{route('register')}}">Register</a></li>
                @endauth

            </ul>
            <div  class="lg:hidden"  @click.prevent="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
    </div>
</nav>

@push('js')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

