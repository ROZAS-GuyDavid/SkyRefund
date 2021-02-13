<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Demande de remboursement') }}
        </h2>
    </x-slot>
 
    @section('content')
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="row" style="margin-top: 5rem;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Demande en cours</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('refunds.create') }}">nouveau remboursement</a>
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
                    <th>company</th>
                    <th>numéro vol</th>
                    <th>numéro réservation</th>
                    <th>motif</th>
                    <th>status</th>
                    <th>fait par</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $value->company }}</td>
                    <td>{{ $value->num_fly }}</td>
                    <td>{{ $value->num_booking }}</td>
                    <td>{{ \Str::limit($value->reason, 100) }}</td>
                    <td>{{ $value->state }}</td>
                    <td>{{ $value->user_id }}</td>
                    <td>
                        <form action="{{ route('refunds.destroy',$value->id) }}" method="POST">   
                            <a class="btn btn-info" href="{{ route('refunds.show',$value->id) }}">Show</a>    
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
