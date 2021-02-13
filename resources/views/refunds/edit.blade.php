<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une demande de remboursement') }}
        </h2>
    </x-slot>
   
    @section('content')
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Product</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('refunds.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <form action="{{ route('refunds.update',$refund->id) }}" method="POST">
                @csrf
                @method('PUT')
        
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Company:</strong>
                            <input type="text" name="company" value="{{ $refund->company }}" class="form-control" placeholder="Enter company">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Numéro de vol:</strong>
                            <input type="text" name="num_fly" value="{{ $refund->num_fly }}" class="form-control" placeholder="Enter num_fly">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Numéro de réservation:</strong>
                            <input type="text" name="num_booking" value="{{ $refund->num_booking }}" class="form-control" placeholder="Enter num_booking">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Motif:</strong>
                            <textarea class="form-control" style="height:150px" name="reason" value="{{ $refund->reason }}" placeholder="Enter reason">{{ $refund->reason }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>statut:</strong>
                            <select name="state"  class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                @foreach($state_options as $option)
                                    <option value="{{$option}}" @if($refund->state == $option) {{ 'selected' }} @endif>{{$option}}</option>
                                @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        
            </form>
        </div>
    @endsection
</x-app-layout>