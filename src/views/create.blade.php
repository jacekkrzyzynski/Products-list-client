@extends('bmclient::layout')
@section('content')


<div>    
  <form action="{{ route('store') }}" method="post">
  {{ csrf_field() }}
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th class="text-center" colspan="5">Add new product</th>
        </tr>
        <tr>
          <th class="text-center">Name</th>
          <th class="text-center">Amount</th>
          <th class="text-center">Submit</th>
        </tr>
      </thead>
      <tbody>       
        <tr>
          <td class="text-center"><input name="name"></td>
          <td class="text-center"><input name="amount"></td>
          <td class="text-center"><button type="submit" class="btn">Add</button></td>
        </tr>
        
        @if (count($errors) > 0)
        <tr>
          <th class="text-center" colspan="3">
            <ul>
              @foreach ($errors->all() as $error)

              <li>{{$error}}</li>

              @endforeach  
            </ul>
          </th>
        </tr>
        @endif
      </tbody>
    </table>
  </form>
</div> 
  
@endsection