@extends('app')

@section('header')
    <div class="header"> </div>
@endsection


@section('content')

<div class="content">

    <div class="row">


        <div class="col-md-4 col-md-offset-3">

        @include('partials._errors')


            <div class="santa">
                <h1>Secret Santa</h1>

                <span>Create your own secret santa list</span>

                <form method="post" class="registerForm" action="/createlist">
                {{ csrf_field()}}
                <!-- Email form email input -->

                <!-- Name form text input -->
                <div class="form-group">
                    <input  type="text" name="list" id="list" class="form-control"
                            value="{{ old('name') }}" required="required" placeholder="List Name - family, company or org name">
                </div>

                <!-- Guestname form text input -->
                <div class="form-group">
                    <input  type="text" name="guest_name" id="guest_name" class="form-control" placeholder="Your Name"
                            value="{{ old('guest_name') }}">
                </div>

                <div class="form-group">
                    <input  type="email" name="email" id="email" placeholder="Your email Address" class="form-control"
                            value="{{ old('email') }}" required="required">
                </div>

                <!--  form submit button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>


                </form>
            </div>

        </div>

    </div>

</div>
</div>
@endsection

@section('footer')
    <div class="footer"> </div>
@endsection