<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une demande de remboursement') }}
        </h2>
    </x-slot>
  
    @section('content')

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-light bg-info">
                            <h5>section name</h5>
                        </div>
                        <div class="card-body">
                            <form class="refund-form" action="{{ route('refunds.store') }}" method="POST">
                                @csrf
                                <div class="form-section">
                                    <div class="row">
                                        <div class="col-sm">  
                                            <label for="flight_from">Parti de</label>
                                            <input type="text" name="flight_from" class="form-control" required>
                                        </div>
                                        <div class="col-sm">
                                            <label for="flight_to">Aéroport de destination finale</label>
                                            <input type="text" name="flight_to" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <p class="text-center mt-3">Était-ce un vol direct ?</p>
                                        <div class="btn-group">
                                                <input type="radio" class="btn-check" name="direct_flight" id="direct_flight_1" value="1" autocomplete="off" checked>
                                                <label for="direct_flight_1" class="btn btn-secondary">Oui</label>
                                                
                                                <input type="radio" class="btn-check" name="direct_flight" id="direct_flight_2" value="0" autocomplete="off">
                                                <label for="direct_flight_2" class="btn btn-secondary">Non</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <p class="text-center mt-3">Quel était le problème du vol que vous avez rencontré ?</p>
                                        <div class="btn-group">
                                            @foreach ($reason_1_options as $id=>$item)
                                                <input type="radio" class="btn-check" name="reason_1" id="reason_{{$id}}" value="{{ $item }}" autocomplete="off" @if($loop->first) checked @endif>
                                                <label for="reason_{{$id}}" class="btn btn-secondary">{{ $item }}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <div class="d-grid gap-2 col-12 mx-auto">
                                        <p class="text-center mt-3">Combien de temps avez-vous été retardé pour atteindre l'aéroport final ?</p>
                                        <div class="btn-group">
                                            @foreach ($reason_2_options as $id=>$item)
                                                <input type="radio" class="btn-check" name="reason_2" id="reason_{{$id}}" value="{{ $item }}" autocomplete="off" @if($loop->first) checked @endif>
                                                <label for="reason_{{$id}}" class="btn btn-secondary">{{ $item }}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <p class="text-center mt-3">Les compagnies aériennes vous ont-elles expliqué pourquoi le vol a été perturbé ?</p>
                                        <div class="btn-group">
                                            @foreach ($has_reason_options as $id=>$item)
                                                <input type="radio" class="btn-check" name="has_reason" id="reason_{{$id}}" value="{{ $item }}" autocomplete="off" @if($loop->first) checked @endif>
                                                <label for="reason_{{$id}}" class="btn btn-secondary">{{ $item }}</label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 col-12 mx-auto">
                                        <p class="text-center mt-3">Quelle est la raison invoquée par les compagnies aériennes ?</p>
                                        <div class="btn-group">
                                            @foreach ($reason_4_options as $id=>$item)
                                                <input type="radio" class="btn-check" name="reason_4" id="reason_{{$id}}" value="{{ $item }}" autocomplete="off" @if($loop->first) checked @endif>
                                                <label for="reason_{{$id}}" class="btn btn-secondary">{{ $item }}</label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-center">
                                        <p class="text-center mt-3">Dite nous en plus sur votre situation</p>
                                        <label for="comment" class="d-none">Décrivez brièvement ce qui s'est passé</label>
                                        <textarea name="comment" placeholder="Décrivez brièvement ce qui s'est passé" class="col-10" required></textarea>
                                    </div>
                                </div>

                                <div class="form-section">
                                        <div class="row justify-content-md-center col-12">
                                            <div class="col-6">
                                                <label class="col-12" for="email">email</label>
                                                <input class="col-12" type="email" name="email" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-md-center col-12 mt-3">
                                            <div class="d-flex justify-content-center col-6">
                                                <input type="checkbox" class="form-check-input mr-2" name="termsConditions" value="" id="email_terms">
                                                <label for="termsConditions" class="form-check-label">
                                                    j'ai lu et accepté les 
                                                    <a href="" target="_blank">Conditions générales </a>
                                                    <span> et </span>
                                                    <a href="" target="_blank">politique de confidentialité</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                <div class="form-section">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="flight_date">Jour du vol</label>
                                            <input type="date" name="flight_date" class="form-control" required>  
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="Airlines">Compagnies aériennes</label>
                                            <input type="text" name="Airlines" class="form-control" required>
                                        </div>
                                        <div class="col-sm">
                                            <label for="flight_num">Numéro de vol</label>
                                            <input type="text" name="flight_num" class="form-control" required>
                                        </div>
                                    </div>
            
                                    
                                </div>

                                <div class="form-section">
                                    
                                    <p class="text-center my-3">Pour déposer une réclamation contre Air France, nous n'avons besoin que de quelques documents:</p>
                                    <div class="flex w-full items-center justify-center bg-grey-lighter">
                                        <label for="files"  class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                                            
                                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                            </svg>
                                            <span class="mt-2 text-base leading-normal">Select a file</span>
                                            <input  type="file" id="files" class="hidden" />
                                        </label>
                                    </div>
                                    
                                    <div class="row justify-content-md-center col-12 mt-6">
                                        <div class="col-6">
                                            <label for="booking_num">numéro de réservation</label>
                                            <input type="text" name="booking_num" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="first_name" class="form-label">Nom</label>
                                            <input type="text" name="first_name" class="form-control">
                                        </div>
                                        <div class="col-sm">
                                            <label for="last_name" class="form-label">Prénom</label>
                                            <input type="text" name="last_name" class="form-control" >
                                        </div>
                                        <div class="col-sm">
                                            <label for="birthdate" class="form-label">Date de naissance</label>
                                            <input type="date" name="birthdate" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="email">email</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="col-sm">
                                            <label for="comfirm_email">comfirm_email</label>
                                            <input type="text" name="comfirm_email" class="form-control" required>
                                        </div>
                                        <div class="col-sm">
                                            <label for="phone">téléphone</label>
                                            <input type="number" name="phone" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="adress">adresse</label>
                                            <input type="text" name="adress" class="form-control" required>
                                        </div>
                                        <div class="col-sm">
                                            <label for="city">ville</label>
                                            <input type="text" name="city" class="form-control" required>
                                        </div>
                                        <div class="col-sm">
                                            <label for="country">pays</label>
                                            <input type="text" name="country" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row justify-content-md-center col-12 mt-6">
                                        <div class="d-flex justify-content-center col-6">
                                            <input type="checkbox" class="form-check-input mr-2" name="termsConditions" value="">
                                            <label for="termsConditions" class="form-check-label">
                                                j'ai lu et accepté les 
                                                <a href="" target="_blank">Conditions générales </a>
                                                <span> et </span>
                                                <a href="" target="_blank">politique de confidentialité</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-navigation">
                                    <button type="button" class="previous btn btn-info float-left">retour</button>
                                    <button type="button" class="next btn btn-info float-right">suivant</button>
                                    <button type="submit" class="btn btn-success float-right">Envoyé</button>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>