@extends('app')

@section('header')
    <div class="header"> </div>
@endsection


@section('content')

<div class="content">

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <div class="santa">
                <h1>Welcome to Secret Santa</h1>

                <span>The following email entries are in your list</span>

                <hr/>

                <div class="row">
                @foreach($giftlist->guests->chunk(4) as $guests)

                    <div class="col-md-5">

                    @foreach($guests as $guest)

                    <ul>
                        <li>{{ $guest->guest_name }}</li>
                    </ul>

                    @endforeach
                    </div>
                @endforeach
                </div>

                <hr/>

                <form method="post" class="registerForm" action="/sendlist">
                {{ csrf_field()}}
                <input type="hidden" name="listName" value="{{ $giftlist->list }}" >
                <input type="hidden" name="activationCode" value="{{ $giftlist->activation }}" >

                <!--  form submit button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Generate</button>
                </div>


                </form>
            </div>

        </div>

    </div>

</div>

</div>
@endsection