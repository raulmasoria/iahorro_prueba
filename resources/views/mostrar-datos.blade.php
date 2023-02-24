@extends('layouts.app')

@section('content')
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-2xl  text-gray-900 m-6">
                    {{ __("Solicita tu hipoteca con iahorro") }}
                </h2>
                <div class="p-6 text-gray-900">
                    {{ __("Estos son los datos que nos has hecho llegar. A continuación te los mostramos y te indicamos tu experto que te acompañará durante todo el proceso") }}
                </div>  
                
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="w-full">
                                <span class="font-bold">
                                    {{ __("Nombre: ") }}
                                </span>
                                {{ $user->name }}                                
                            </label>
                        </div>    
                        <div>
                            <label class="w-full">
                                <span class="font-bold">
                                {{ __("Apellidos: ") }}
                                </span>
                                {{ $user->lastname }}
                            </label>
                        </div>    
                        <div>     
                            <label class="w-full">
                                <span class="font-bold">
                                {{ __("Teléfono: ") }}
                                </span>
                                {{ $user->phone }}
                            </label> 
                        </div>    
                        <div>
                            <label class="w-full">
                                <span class="font-bold">
                                {{ __("Correo electrónico: ") }}
                                </span>
                                {{ $user->email }}
                            </label> 
                        </div>    
                        <div>
                            <label class="w-full">
                                <span class="font-bold">
                                {{ __("Ingresos netos: ") }}
                                </span>
                                {{ $mortgage->net_income }}
                            </label>
                        </div>    
                        <div>
                            <label class="w-full">
                                <span class="font-bold">
                                {{ __("Cantidad solicitada: ") }}
                                </span>
                                {{ $mortgage->requested_amount }}
                            </label>
                        </div>    
                        <div>
                            <label class="w-full">
                                <span class="font-bold">
                                {{ __("Franja horaria de comunicación: ") }}
                                </span>
                                {{ $franja->time }}
                            </label>
                        </div>    
                        <div>
                            <label class="w-full">
                                <span class="font-bold">
                                {{ __("Experto: ") }}
                                </span>
                                {{ $expert->name . ' ' . $expert->lastname }}
                            </label>             
                        </div>   
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
@endsection
