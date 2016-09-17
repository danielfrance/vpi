<h2>Contact form submission</h2>

<p>
    name: {{$request->name}} <br>
    email: {{$request->email}} <br>
    @if(isset($request->phone))
        phone: {{ $request->phone}} <br>
    @endif
    message: {{ $request->message}}
</p>