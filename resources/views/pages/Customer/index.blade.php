<h1>Hey hey heeeei!</h1>
<ol>
@foreach($customer as $c)
  <li>{{ $c->nama_depan }} {{ $c->nama_belakang }}</li>
@endforeach
</ol>

@if($errors)
  <ul>
  @foreach($errors->all() as $message)
    <li>{{ $message }}</li>
  @endforeach
  </ul>
@endif