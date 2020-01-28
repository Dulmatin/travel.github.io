@extends('layouts.succes')
@section('title','checkout Succes')

@section('content')
    
<main>
        <div class="section-succes d-flex align-items-center">
            <div class="col text-center">
            <img src="{{url('frontend/images/ic_mail.png')}}" alt="">
                <h1>Success Bro !!</h1>
                <p>
                    We've Sent You email for trip Instruction <br> 
                    please read it as well

                </p>
                <a href="{{url('/')}}" class="btn btn-home-page mt-3 px-5">
                    Home Page
                </a>
            </div>
        </div> 
    </main>

@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}">
@endpush
