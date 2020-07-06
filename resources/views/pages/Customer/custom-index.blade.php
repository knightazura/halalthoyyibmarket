<h1>This is custom index page for Customer!!</h1>
<ol>
@foreach($customer as $c)
  <li>{{ $c->nama_depan }}</li>
@endforeach
</ol>