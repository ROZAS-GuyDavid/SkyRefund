<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Demande de remboursement') }}
        </h2>
    </x-slot>
 
    @section('content')
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="row" style="margin-top: 5rem;">
                <div class="row justify-content-between">
                    <div class="col-lg-4">
                        <h2>Demande en cours</h2>
                    </div>
                    <div class="col-md-auto">
                        <a class="btn btn-success mb-2 mt-0" href="{{ route('refunds.create') }}">nouveau remboursement</a>
                    </div>
                </div>
            </div>
        
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        
            <table class="table table-bordered">
                <tr>
                    <th>id</th>
                    <th>départ</th>
                    <th>arriver</th>
                    <th>date de vol</th>
                    <th>companie</th>
                    <th>numéro de vol</th>
                    <th>numéro de reservation</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->flight_from }}</td>
                    <td>{{ $value->flight_to }}</td>
                    <td>{{ $value->flight_date }}</td>
                    <td>{{ $value->Airlines }}</td>
                    <td>{{ $value->flight_num }}</td>
                    <td>{{ $value->booking_num }}</td>
                    <td>
                        <form action="{{ route('refunds.destroy',$value->id) }}" method="POST">   
                            <a class="btn btn-primary" href="{{ route('refunds.show',$value->id) }}">Show</a>    
                            <a class="btn btn-primary" href="{{ route('refunds.edit',$value->id) }}">Edit</a>   
                            @csrf
                            @method('DELETE')      
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>  
            {!! $data->links() !!}
        </div>
    @endsection
</x-app-layout>
