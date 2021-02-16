<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight pull-left">
                    {{ __('Demande de remboursement') }}
                </h2>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('refunds.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </x-slot>
  
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header text-light bg-info">
                        <h5>section name</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Départ de :</strong>
                                {{ $refund->flight_from }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Destination :</strong>
                                {{ $refund->flight_to }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Vol direct :</strong>
                                {{ $refund->direct_flight }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Quel était le problème du vol que vous avez rencontré ? :</strong>
                                {{ $refund->reason_1 }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Combien de temps avez-vous été retardé pour atteindre l'aéroport final ? :</strong>
                                {{ $refund->reason_2 }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Les compagnies aériennes vous ont-elles expliqué pourquoi le vol a été perturbé ? :</strong>
                                {{ $refund->has_reason }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Quelle est la raison invoquée par les compagnies aériennes ? :</strong>
                                {{ $refund->reason_4 }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Commentaire :</strong>
                                {{ $refund->comment }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Email :</strong>
                                {{ $refund->email }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Date de vol :</strong>
                                {{ $refund->flight_date }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Companie :</strong>
                                {{ $refund->Airlines }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Numéro de vol :</strong>
                                {{ $refund->flight_num }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Numéro de réservation :</strong>
                                {{ $refund->booking_num }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Nom :</strong>
                                {{ $refund->first_name }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Prénom :</strong>
                                {{ $refund->last_name }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Date d'anniversaire :</strong>
                                {{ $refund->birthdate }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Confirmation email :</strong>
                                {{ $refund->comfirm_email }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Adresse :</strong>
                                {{ $refund->adress }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Ville :</strong>
                                {{ $refund->city }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Pays :</strong>
                                {{ $refund->country }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Numéro de téléphone :</strong>
                                {{ $refund->phone }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Status :</strong>
                                {{ $refund->status }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

</x-app-layout>