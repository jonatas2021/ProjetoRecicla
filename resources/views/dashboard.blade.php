<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="/add-pontocoleta" method="POST" id="formulario">
                        @csrf
                        <input type="text" name="latitude" placeholder="latitude">
                        <input type="text" name="longitude" placeholder="longitude">
                        <input type="text" name="status" placeholder="status">
                        <input type="submit" value="Adicionar" class="btn">
                    </form>
            
            <div class="p-6 text-gray-900">
            <table> 
                             @foreach(Auth::user()->pontosColeta as $pontos)
                                    <tr>
                                        <td>{{$pontos->latitude}}</td>
                                        <td>{{$pontos->longitude}}</td>
                                        <td>{{$pontos->status}}</td>

                                        <td>
                                            <form action="/point-delete/{{$pontos->id}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="deletar" class="btn-function">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </table> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
