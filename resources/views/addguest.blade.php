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

                <span>By entering your email address you are agreeing to participate in {{ $giftlist->list.'\'s' }} secret santa list.</span>


                @include('partials._errors')

                <form method="post" class="registerForm" action="/addguest">
                {{ csrf_field()}}
                <input type="hidden" name="listId" value="{{ $giftlist->id }}" >
                <!-- Email form email input -->

                <!-- Guestname form text input -->
                <div class="form-group">
                    <input  type="text" name="guest_name" id="guest_name" class="form-control" placeholder="Your Name"
                            value="{{ old('guest_name') }}">
                </div>

                <div class="form-group">
                    <input  type="email" name="email" id="email" placeholder="Email Address" class="form-control"
                            value="{{ old('email') }}" required="required">
                </div>

                <!--  form submit button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    <a href="/" style="color: white;padding-left: 10px;" >Create a new list</a>
                </div>


                </form>
            </div>

        </div>

    </div>

</div>




@endsection

@section('footer')
    <div class="footer"> </div>
@endsection