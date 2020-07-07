<h1>Hey hey heeeei!</h1>
@if($customer['deleted_customer'])
  <p>Deleted Customer: {{ $customer['deleted_customer']->nama_depan }} {{ $customer['deleted_customer']->nama_belakang }}</p>
  <ol>
  @foreach($customer['data'] as $c)
    <li>{{ $c->nama_depan }} {{ $c->nama_belakang }}</li>
  @endforeach
  </ol>
@else
  <ol>
  @foreach($customer as $c)
    <li>{{ $c->nama_depan }} {{ $c->nama_belakang }}</li>
  @endforeach
  </ol>
@endif

@if($errors)
  <ul>
  @foreach($errors->all() as $message)
    <li>{{ $message }}</li>
  @endforeach
  </ul>
@endif