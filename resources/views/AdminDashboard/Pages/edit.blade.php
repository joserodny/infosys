<x-app>
    <section class=" bg-blueGray-50">
        <div class="w-full lg:w-6/12 px-4 mx-auto pt-6">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                <div class="rounded-t mb-0 px-6 py-6">

                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <div class="text-blueGray-400 text-center mb-3 font-bold">
                        <small>Edit user</small>
                    </div>
                    <form method="POST" action="{{route('update', ['user' => $id])}}">
                        @csrf
                        @method('PUT')
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Name</label>
                            <input value="{{$id->name}}"
                                   name="name"
                                   type="text"
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   placeholder="Name">
                            @error('name')
                            <p class="text-xs italic text-red-500">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">Email</label>
                            <input  value="{{$id->email}}"
                                    name="email"
                                    type="email"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Email">
                            @error('email')
                            <p class="text-xs italic text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="text-center mt-6">
                            <button
                                class="mt-3 text-lg font-semibold
                                bg-gray-800 w-full text-white rounded-lg
                                px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                                Update Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app>

