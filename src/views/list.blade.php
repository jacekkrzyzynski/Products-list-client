@extends('bmclient::layout')
@section('content')


<div>

  <h3><a href="{{ route('create') }}">Add new product</a></h3>
    
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th class="text-center" colspan="5">Products in stock</th>
      </tr>
      <tr>
        <th class="text-center">Id</th>
        <th class="text-center">Name</th>
        <th class="text-center">Amount</th>
        <th class="text-center">Edit</th>
        <th class="text-center">Delete</th>
      </tr>
    </thead>
    <tbody>
      @if (count($products_compacted['products_in_stock']) > 0)
      @foreach($products_compacted['products_in_stock'] as $nr => $product)         
      <tr>
        <td class="text-center">{{ $nr+1 }}</td>
        <td class="text-center">{{ $product->name }}</td>
        <td class="text-center">{{ $product->amount }}</td>
        <td class="text-center"><a href="{{ route('edit', 'id='.$product->id) }}">Edit</a></td>
        <td class="text-center"><a href="{{ route('delete', 'id='.$product->id) }}" class="text-danger">Delete</a></td>
      </tr>
      @endforeach
      @else
        <tr>
        <td class="text-center" colspan="5">Empty</td>
      </tr>
      @endif
    </tbody>
  </table>
  
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th class="text-center" colspan="5">Products in stock quantity > 5</th>
      </tr>
      <tr>
        <th class="text-center">Id</th>
        <th class="text-center">Name</th>
        <th class="text-center">Amount</th>
        <th class="text-center">Edit</th>
        <th class="text-center">Delete</th>
      </tr>
    </thead>
    <tbody>
      @if (count($products_compacted['products_in_stock_5']) > 0)
      @foreach($products_compacted['products_in_stock_5'] as $nr => $product)    
      <tr>
        <td class="text-center">{{ $nr+1 }}</td>
        <td class="text-center">{{ $product->name }}</td>
        <td class="text-center">{{ $product->amount }}</td>
        <td class="text-center"><a href="{{ route('edit', 'id='.$product->id) }}">Edit</a></td>
        <td class="text-center"><a href="{{ route('delete', 'id='.$product->id) }}" class="text-danger">Delete</a></td>
      </tr>
      @endforeach
      @else
        <tr>
        <td class="text-center" colspan="5">Empty</td>
      </tr>
      @endif
    </tbody>
  </table>
  
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th class="text-center" colspan="5">Products out of stock</th>
      </tr>
      <tr>
        <th class="text-center">Id</th>
        <th class="text-center">Name</th>
        <th class="text-center">Amount</th>
        <th class="text-center">Edit</th>
        <th class="text-center">Delete</th>
      </tr>
    </thead>
    <tbody>
      @if (count($products_compacted['products_out_of_stock']) > 0)  
      @foreach($products_compacted['products_out_of_stock'] as $nr => $product)
      <tr>
        <td class="text-center">{{ $nr+1 }}</td>
        <td class="text-center">{{ $product->name }}</td>
        <td class="text-center">{{ $product->amount }}</td>
        <td class="text-center"><a href="{{ route('edit', 'id='.$product->id) }}">Edit</a></td>
        <td class="text-center"><a href="{{ route('delete', 'id='.$product->id) }}" class="text-danger">Delete</a></td>
      </tr>
      @endforeach
      @else
        <tr>
        <td class="text-center" colspan="5">Empty</td>
      </tr>
      @endif
    </tbody>
  </table>
    
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th class="text-center" colspan="5">All products</th>
      </tr>
      <tr>
        <th class="text-center">Id</th>
        <th class="text-center">Name</th>
        <th class="text-center">Amount</th>
        <th class="text-center">Edit</th>
        <th class="text-center">Delete</th>
      </tr>
    </thead>
    <tbody>
      @if (count($products_compacted['all_products']) > 0)
      @foreach($products_compacted['all_products'] as $nr => $product)
      <tr>
        <td class="text-center">{{ $nr+1 }}</td>
        <td class="text-center">{{ $product->name }}</td>
        <td class="text-center">{{ $product->amount }}</td>
        <td class="text-center"><a href="{{ route('edit', 'id='.$product->id) }}">Edit</a></td>
        <td class="text-center"><a href="{{ route('delete', 'id='.$product->id) }}" class="text-danger">Delete</a></td>
      </tr>
      @endforeach
      @else
        <tr>
        <td class="text-center" colspan="5">Empty</td>
      </tr>
      @endif
    </tbody>
  </table>
</div>

@endsection