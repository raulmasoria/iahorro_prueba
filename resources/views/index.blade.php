@extends('layouts.app')

@section('content')
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-2xl  text-gray-900 m-6">
                    {{ __("Solicita tu hipoteca con iahorro") }}
                </h2>
                <div class="p-6 text-gray-900">
                    {{ __("En esta web podrás solicitar la hipoteca a tu medida, rellena los siguientes datos para ello.") }}
                </div>  
                
                <form method="post" action="{{ route('user.store') }}" class="p-6 space-y-6">
                    @csrf
            
                    <div>
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name"/>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
            
                    <div>
                        <x-input-label for="lastname" :value="__('Apellidos')" />
                        <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname')" required autofocus autocomplete="lastname"/>
                        <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                    </div>
            
                    <div>
                        <x-input-label for="phone" :value="__('Telefono')" />
                        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" required autofocus autocomplete="phone"/>
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>
            
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="email" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
            
            
                    <div>
                        <x-input-label for="ingresos" :value="__('Ingresos netos')" />
                        <x-text-input id="ingresos" name="ingresos" type="text" class="mt-1 block w-full" :value="old('ingresos')" required autofocus autocomplete="ingresos" />
                        <x-input-error class="mt-2" :messages="$errors->get('ingresos')" />
                    </div>
            
                    <div>
                        <x-input-label for="cantidad" :value="__('Cantidad solicitada')" />
                        <x-text-input id="cantidad" name="cantidad" type="text" class="mt-1 block w-full" :value="old('cantidad')" required autofocus autocomplete="cantidad" />
                        <x-input-error class="mt-2" :messages="$errors->get('cantidad')" />
                    </div>

                    <div>
                        <x-input-label for="hora" :value="__('Franja de hora de comunicación')" />
                        <select id="hora" name="hora" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required autofocus autocomplete="hora">
                            <option value="0">{{ __("-- Elige una franja horaria --") }}</option>
                            @foreach ($franjas as $franja)
                                <option value="{{ $franja->id }}">{{ $franja->time }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('hora')" />
                    </div>
            
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Guardar') }}</x-primary-button>          
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection