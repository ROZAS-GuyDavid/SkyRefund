<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight pull-left">
                    {{ __('Modifier une demande de remboursement') }}
                </h2>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('refunds.index') }}"> Back</a>
                </div>
            </div>
        </div>
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

                        <div class="form-section-edit">
                            <label for="flight_from">Parti de</label>
                            <input value="{{ $refund->flight_from }}" type="text" name="flight_from" class="form-control" required>

                            <label for="flight_to">Aéroport de destination finale</label>
                            <input value="{{ $refund->flight_to }}" type="text" name="flight_to" class="form-control" required>


                            <div>Était-ce un vol direct?</div>

                            <div class="form-check">
                                @php
                                    // dd($refund->direct_flight);
                                @endphp
                                <input type="radio" name="direct_flight" id="direct_flight_1" value="1" @if( $refund->direct_flight == 1 ) checked @endif>
                                <label for="direct_flight_1">Oui</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="direct_flight" id="direct_flight_2" value="0" @if( $refund->direct_flight == 0 ) checked @endif>
                                <label for="direct_flight_2">Non</label>
                            </div>
                        </div>

                        <div class="form-section-edit">
                            <div>Quel était le problème du vol que vous avez rencontré ?</div>

                            @foreach ($reason_1_options as $id=>$item)

                                <div class="form-check">
                                    <input type="radio" name="reason_1" id="reason_{{$id}}" value="{{ $item }}" @if( $item == $refund->reason_1 ) checked @endif>
                                    <label for="reason_{{$id}}">{{ $item }}</label>
                                </div>
                                
                            @endforeach

                            <div>Combien de temps avez-vous été retardé pour atteindre l'aéroport final ?</div>

                            @foreach ($reason_2_options as $id=>$item)

                                <div class="form-check">
                                    <input type="radio" name="reason_2" id="reason_{{$id}}" value="{{ $item }}" @if( $item == $refund->reason_2 ) checked @endif>
                                    <label for="reason_{{$id}}">{{ $item }}</label>
                                </div>
                                
                            @endforeach
                        </div>

                        <div class="form-section-edit">
                            <div>Les compagnies aériennes vous ont-elles expliqué pourquoi le vol a été perturbé ?</div>

                            
                            @foreach ($has_reason_options as $id=>$item)

                                <div class="form-check">
                                    <input type="radio" name="has_reason" id="reason_{{$id}}" value="{{ $item }}" @if( $item == $refund->has_reason ) checked @endif>
                                    <label for="reason_{{$id}}">{{ $item }}</label>
                                </div>
                                
                            @endforeach

                            <div>Quelle est la raison invoquée par les compagnies aériennes ?</div>

                            
                            @foreach ($reason_4_options as $id=>$item)

                                <div class="form-check">
                                    <input type="radio" name="reason_4" id="reason_{{$id}}" value="{{ $item }}" @if( $item == $refund->reason_4 ) checked @endif>
                                    <label for="reason_{{$id}}">{{ $item }}</label>
                                </div>
                                
                            @endforeach

                            <div>Dite nous en plus sur votre situation</div>

                            <label for="comment">Décrivez brièvement ce qui s'est passé</label>
                            <textarea name="comment" required>{{ $refund->comment }}</textarea>
                        </div>

                        <div class="form-section-edit">
                            <label for="email">email</label>
                            <input value="{{ $refund->email }}" type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-section-edit">
                            <label for="flight_date">Jour du vol</label>
                            <input value="{{ $refund->flight_date }}" type="date" name="flight_date" class="form-control" required>

                            <label for="Airlines">Compagnies aériennes</label>
                            <input value="{{ $refund->Airlines }}" type="text" name="Airlines" class="form-control" required>
                            
                            <label for="flight_num">Numéro de vol</label>
                            <input value="{{ $refund->flight_num }}" type="text" name="flight_num" class="form-control" required>
                        </div>

                        <div class="form-section-edit">
                            {{-- <label for="files" class="form-label">Pour déposer une réclamation contre Air France, nous n'avons besoin que de quelques documents:</label>
                            <input type="file" id="files" class="form-control"> --}}
                            
                            <label for="booking_num">Entrez le numéro de réservation de vol</label>
                            <input value="{{ $refund->booking_num }}" type="text" name="booking_num" class="form-control" required>
                        </div>

                        <div class="form-section-edit">
                            <label for="first_name" class="form-label">Nom</label>
                            <input value="{{ $refund->first_name }}" type="text" name="first_name" class="form-control">
                        
                            <label for="last_name" class="form-label">Prénom</label>
                            <input value="{{ $refund->last_name }}" type="text" name="last_name" class="form-control" >
                        
                            <label for="birthdate">Date de naissance</label>
                            <input value="{{ $refund->birthdate }}" type="date" name="birthdate" class="form-control" required>

                            <label for="email">email</label>
                            <input value="{{ $refund->email }}" type="email" name="email" class="form-control" required>

                            <label for="comfirm_email">comfirm_email</label>
                            <input value="{{ $refund->comfirm_email }}" type="text" name="comfirm_email" class="form-control" required>

                            <label for="adress">adresse</label>
                            <input value="{{ $refund->adress }}" type="text" name="adress" class="form-control" required>

                            <label for="city">ville</label>
                            <input value="{{ $refund->city }}" type="text" name="city" class="form-control" required>

                            <label for="country">pays</label>
                            <input value="{{ $refund->country }}" type="text" name="country" class="form-control" required>

                            <label for="phone">téléphone</label>
                            <input value="{{ $refund->phone }}" type="number" name="phone" class="form-control" required>
                        </div>

                        <div class="form-navigation">
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