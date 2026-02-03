@foreach($logTypes as $t)
    <div>
        <p>
            Action Id: {{$t->id}} <br/>
            [ {{$t->action_name}} ]
        </p>
    </div>
@endforeach
