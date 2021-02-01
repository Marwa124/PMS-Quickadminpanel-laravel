<table class="table table-striped">
    <thead>
      <tr>
        <th class="center">#</th>
        <th>Item</th>
        <th>Description</th>
        <th class="center">Quantity</th>
        <th class="right">Unit Cost</th>
        <th class="right">Selling Price</th>
        <th class="right">Total</th>
      </tr>
    </thead>
    <tbody>
    @if($ProposalsItem->isEmpty() != true)
      @foreach($ProposalsItem as $item)
       @dd($item)
       <tr>
        <td class="center">{{ $loop->iteration }}</td>
        <td class="left">{{ $item->name }}</td>
        <td class="left">{{ $item->description }}</td>
        <td class="center">{{ $item->quantity }}</td>
        <td class="right">{{ $item->unit_cost }}</td>
        <td class="right">{{ ($item->unit_cost * $item->quantity )  }}</td>
        <td class="right">{{ $item->total_cost_price }}</td>
       </tr>
      @endforeach
    @endif
    </tbody>
  </table>