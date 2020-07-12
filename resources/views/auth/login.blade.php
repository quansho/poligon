@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 h-full">
    <div class="flex content-center items-center justify-center h-full">
        <div class="w-full lg:w-4/12 px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
            >
                <div class="rounded-t mb-0 px-6 py-6">
                    <div class="text-center mb-3">
                        <h6 class="text-gray-600 text-sm font-bold">
                            Sign in with
                        </h6>
                    </div>
                    <a href="{{ url('/login/github') }}" class="btn btn-github"><i class="fa fa-github"></i> Github</a>
                    <a href="{{ url('/login/twitter') }}" class="btn btn-twitter" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                    <a href="{{ url('/login/facebook') }}" class="btn btn-facebook" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                    <a href="{{ url('/login/vk') }}" class="btn btn-facebook" class="btn btn-facebook"><i class="fa fa-facebook"></i> Vk</a>

                    <div class="btn-wrapper text-center">
                        <button
                            class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs"
                            type="button"
                            style="transition: all 0.15s ease 0s;"
                        >
                            <img
                                alt="..."
                                class="w-5 mr-1"
                                src="./assets/img/github.svg"
                            />Github</button
                        ><button
                            class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs"
                            type="button"
                            style="transition: all 0.15s ease 0s;"
                        >
                            <img
                                alt="..."
                                class="w-5 mr-1"
                                src="./assets/img/google.svg"
                            />Google
                        </button>
                    </div>
                    <hr class="mt-6 border-b-1 border-gray-400" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <div class="text-gray-500 text-center mb-3 font-bold">
                        <small>Or sign in with credentials</small>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="relative w-full mb-3">
                            <label
                                class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                for="grid-password"
                            >{{ __('E-Mail Address') }}</label
                            ><input
                                type="email"
                                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                                placeholder="Email"
                                style="transition: all 0.15s ease 0s;"
                                value="{{ old('email') }}"
                                name="email"
                            />
                        </div>
                        <div class="relative w-full mb-3">
                            <label
                                class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                for="grid-password"
                            >Password</label
                            ><input
                                type="password"
                                class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                                placeholder="Password"
                                style="transition: all 0.15s ease 0s;"
                                name="password"
                            />
                        </div>
                        <div>
                            <label class="inline-flex items-center cursor-pointer"
                            ><input
                                    id="customCheckLogin"
                                    type="checkbox"
                                    class="form-checkbox text-gray-800 ml-1 w-5 h-5"
                                    style="transition: all 0.15s ease 0s;"
                                    {{ old('remember') ? 'checked' : '' }}
                                    name="remember"
                                /><span class="ml-2 text-sm font-semibold text-gray-700"
                                > {{ __('Remember Me') }}</span
                                ></label>
                        </div>
                        <div class="text-center mt-6">
                            <button
                                class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                                type="submit"
                                style="transition: all 0.15s ease 0s;"
                            >
                                {{ __('Sign In') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-wrap mt-6">
                <div class="w-1/2">
                    @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}" class="text-gray-300"
                    ><small> {{ __('Forgot Your Password?') }}</small></a
                    >
                    @endif

                </div>
                <div class="w-1/2 text-right">
                    <a href="#pablo" class="text-gray-300"
                    ><small>Create new account</small></a
                    >
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
