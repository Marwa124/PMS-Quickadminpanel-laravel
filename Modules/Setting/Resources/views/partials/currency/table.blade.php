

<div class="modal fade " id="tableCurrency" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">


        <div class="modal-content " style="width:900px !important;overflow:auto;max-height:600px;">



            <div class="card  card-custom">
               <h5 class="card-header " style="text-align: left">  
                  
                     
                           @lang('settings.all_currency')
                          
                    
                  
               </h5>
               <div class="card-body">
                   <p class="error-message" style="color:red"></p>
                   <div class="table-responsive">
                    <table class="table table-striped">

                        <thead>
                            <th>@lang('settings.code')</th>
                            <th>@lang('settings.name')</th>
                            <th>@lang('settings.symbol')</th>
                            <th>@lang('settings.action')</th>
                        </thead>

                        <tbody>

                        

                            @forelse($currencies as $currency)
                                <tr class="currency_{{ $currency->id }}">
                                   
                                   
                                    <td>
                                        <span class="text_currency text_code_{{ $currency->id }}">{{ $currency->code }} </span>
                                        <input type="text" class="d-none input_currency code_{{ $currency->id }}" value="{{ $currency->code}}">
                                    </td>
                                    <td>
                                        <span class="text_currency text_name_{{ $currency->id }}">{{ $currency->name }}</span>
                                        
                                        <input type="text" class="d-none input_currency name_{{ $currency->id }}" value="{{ $currency->name}}">
                                    </td>

                                    <td>
                                        <span class="text_currency text_symbol_{{ $currency->id }}">{{ $currency->symbol }}</span>
                                        <input type="text" class="d-none input_currency symbol_{{ $currency->id }}" value="{{ $currency->symbol}}">

                                    </td>        
                                    <td>
                                        <button class="text_currency  btn btn-xs btn-primary" onclick="event.preventDefault();start_editing({{ $currency->id }});" ><i class="fa fa-pencil-square-o"></i></button>
                                        <button class="d-none input_currency btn btn-xs btn-success" onclick="event.preventDefault();start_editing_currency({{ $currency->id }});" ><i class="fa fa-check"></i></button>
                                        <button class="d-none input_currency btn btn-xs btn-danger" onclick="event.preventDefault();start_removing_currency({{ $currency->id }});" ><i class="fa fa-times"></i></button>
                                    </td>
                                   


                                </tr>
                            @empty
                                
                            @endforelse

                     
                        </tbody>
                    </table>
                   </div>
                  
                </div>
            </div>
         
            
            
            
            

          
        </div>
        <!-- /.modal-content -->
    </div>
  </div>
  @section('scripts')
  @parent

  <script>
 function start_editing(id){
    $('.currency_'+id + ' .text_currency').addClass('d-none');

    $('.currency_'+id + ' .name_'+id).removeClass('d-none');
    $('.currency_'+id + ' .code_'+id).removeClass('d-none');
    $('.currency_'+id + ' .symbol_'+id).removeClass('d-none');
    $('.currency_'+id + ' .input_currency').removeClass('d-none');

 }

 function start_editing_currency(id){
    $('.error-message').text('');
    if(confirm('are you sure') == true){
       
        var code   = $('.code_'+id).val();
        var name   = $('.name_'+id).val();
        var symbol = $('.symbol_'+id).val();
        $.ajax({
            url: '{{ url("admin/update_currency") }}',
            type: 'POST',
            data: {
                _token:"{{ csrf_token() }}",
                id:id,
                code:code,
                name:name,
                symbol:symbol
            },
            beforeSend: function(){
                console.log('beforeSend');
            },
            success: function(data){
                console.log(data)


                
              



                $('.text_code_'+id).text(code);
                $('.text_name_'+id).text(name);
                $('.text_symbol_'+id ).text(symbol);

                $('.currency_'+id + ' .text_currency').removeClass('d-none');

                $('.currency_'+id + ' .name_'+id).addClass('d-none');
                $('.currency_'+id + ' .code_'+id).addClass('d-none');
                $('.currency_'+id + ' .symbol_'+id).addClass('d-none');
                $('.currency_'+id + ' .input_currency').addClass('d-none');
                            },
            error: function(data){
                
                $('.error-message').text(data.responseJSON.message);

            }

        
        })
       



    }
 }
 function start_removing_currency(id){
     if(confirm('are you sure') == true){
        $.ajax({
            url: '{{ url("admin/remove_currency") }}',
            type: 'POST',
            data: {
                _token:"{{ csrf_token() }}",
                id:id,        
            },
            beforeSend: function(){
                console.log('beforeSend');
            },
            success: function(data){
                $('.currency_'+id ).remove();

      
                            },
            error: function(data){
                
                $('.error-message').text(data.responseJSON.message);

            }

        
        })
     }
 }

  </script>
 
@endsection