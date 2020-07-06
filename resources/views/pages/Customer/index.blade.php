<h1>Hey hey heeeei!</h1>
<ol>
@foreach($customer as $c)
  <li>{{ $c->nama_depan }}</li>
@endforeach
</ol>