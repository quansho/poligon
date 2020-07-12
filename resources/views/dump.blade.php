@extends('layouts.app')

@section('content')
    <div class="flex justify-center bg-gray-200 pt-20 shadow-2xl">

        <div class="overflow-hidden  bg-white mb-4  w-full md:w-1/4">
            <div class="px-6 py-4 mb-2 mt-4 mb-8">
                <div class="uppercase tracking-wide text-c2 mb-4">Основные (Foundamental)</div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest border-b-0" style="{{ (request()->is('foundamentals/property-container')) ? 'border-left: 4px solid #0018c2 !important;' : '' }}">
                    <div class="pl-2"><a href="{{route('property.container')}}">Контейнер свойств</a></div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest border-b-0" style="{{ (request()->is('foundamentals/delegation')) ? 'border-left: 4px solid #0018c2 !important;' : '' }}">
                    <div class="pl-2"><a href="{{route('delegation')}}">Делегирование</a></div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest" style="{{ (request()->is('foundamentals/event-channel')) ? 'border-left: 4px solid #0018c2 !important;' : '' }}">
                    <div class="pl-2"><a href="{{route('event.channel')}}">Канал событий</a></div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest" style="{{ (request()->is('foundamentals/interface-pattern')) ? 'border-left: 4px solid #0018c2 !important;' : '' }}">
                    <div class="pl-2"><a href="{{route('interface')}}">Интерфейс</a></div>
                </div>
                <div class="uppercase tracking-wide text-c2 mb-4 mt-8">Пораждающие шаблоны (Creational)</div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                    <div class="pl-2">Абстрактная фабрика</div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                    <div class="pl-2">Фабричный метод</div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                    <div class="pl-2">Статическая фабрика</div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                    <div class="pl-2">Простая фабрика</div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                    <div class="pl-2">Одиночка</div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                    <div class="pl-2">Пул одиночек</div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                    <div class="pl-2">Строитель</div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                    <div class="pl-2">Ленивая загрузка</div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                    <div class="pl-2">Строитель</div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                    <div class="pl-2">Прототип</div>
                </div>
                <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                    <div class="pl-2">Обектный пул</div>
                </div>

                <div>
                    <div class="uppercase tracking-wide text-c2 mb-4 mt-8">Структурные шаблоны</div>
                    <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                        <div class="pl-2">Адаптер</div>
                    </div>
                    <div class="flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest">
                        <div class="pl-2">Фасад</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="max-w-6xl rounded overflow-hidden ">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">
                    <h1 class="text-4xl">
                        {{$name}}
                    </h1>
                    <p class="text-sm">шаблон проектирования</p>


                    <p class="italic pt-10">
                      @php
                         echo  Route::currentRouteAction()
                      @endphp
                    </p>

                </div>
                <p class="text-gray-700 text-base">
                    {{$description->description}}
                    @if(!empty($description->url))
                    <a href="{{$description->url}}" class="no-underline hover:underline text-blue-500 text-lg" target="_blank">More</a>
                    @endif
                </p>
            </div>
            <div class="px-6 py-4">
                @if(isset($item))
                    @dump($item)
                @endif
            </div>
        </div>
    </div>
@endsection
