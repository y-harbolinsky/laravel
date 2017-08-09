<section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <header>
            <h3>Test form</h3>
        </header>

        {!! Form::open(['url' => '/', 'method' => 'post']) !!}

        <div class="form-group">
            {!! Form::label('Your Name') !!}
            {!! Form::text('name', null, ['required', 'class'=>'form-control', 'placeholder'=>'Your name']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your E-mail Address') !!}
            {!! Form::text('email', null, ['required', 'class'=>'form-control', 'placeholder'=>'Your e-mail address']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your Password') !!}
            {!! Form::password('password', null, ['required', 'class'=>'form-control', 'placeholder'=>'Your Password']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Test Checkbox') !!}
            {!! Form::checkbox('check', 'Checkbox', ['required', 'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your radio') !!}
            {!! Form::radio('radio', 'male', ['required', 'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your Image') !!}
            {!! Form::file('message', null, ['required', 'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Image') !!}
            {!! Form::textarea('image') !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your select') !!}
            {!! Form::select('select', ['L' => 'Large', 'S' => 'Small'], ['required', 'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your email') !!}
            {!! Form::email('email', null, ['required', 'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Contact Us!', ['class'=>'btn btn-primary']) !!}
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        {!! Form::close() !!}

    </div>
</section>
