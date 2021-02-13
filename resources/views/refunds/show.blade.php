<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Demande de remboursement') }}
        </h2>
    </x-slot>
  
    @section('content')
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Show Product</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('refunds.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company:</strong>
                        {{ $refund->company }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Numéro de vol:</strong>
                        {{ $refund->num_fly }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Numérode de réservation:</strong>
                        {{ $refund->num_booking }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Motif:</strong>
                        {{ $refund->reason }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>statut:</strong>
                        {{ $refund->state }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User_id:</strong>
                        {{ $refund->user_id }}
                    </div>
                </div>
            </div>
        </div>
    @endsection

</x-app-layout>