<div class="tab-pane fade show active company-details" id="v-pills-company-details" role="tabpanel"
aria-labelledby="v-pills-details-tab">
<div class="card  card-custom">
   <h5 class="card-header " style="text-align: left">  
      
         
               @lang('settings.lead_source')
              
        
      
   </h5>
   <div class="card-body">


    <p class="error-message" style="color:red"></p>
    <div class="table-responsive">
     <table class="table table-striped">

         <thead>
             <th>@lang('settings.lead_source_en')</th>
             <th>@lang('settings.lead_source_ar')</th>
            
             <th>@lang('settings.action')</th>
         </thead>

         <tbody>

         
      
             @forelse($lead_sources as $source)
     
            
                 <tr class="source_{{ $source->id }}">
                    <form onsubmit="" action="{{ route('admin.lead_source.settings.update') }}" method='post' id="form_{{ $source->id }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $source->id }}">
                    
                     <td>
                         <span class=" text_source_en_{{ $source->id }}">{{ ucfirst($source->lead_source) }} </span>
                         <input type="text" name="lead_source" class="d-none input_source_en code_source_en_{{ $source->id }}" value="{{ $source->lead_source}}">
                     </td>
                     <td>
                         <span class="text_source text_source_ar_{{ $source->id }}">{{  $source->lead_source_ar }} </span>
                         <input type="text" name="lead_source_ar" class="d-none input_source_ar code_source_ar_{{ $source->id }}" value="{{ $source->lead_source_ar}}">
                     </td>
                 

                
                     <td>
                      
                         <button class="text_source_{{ $source->id }}  btn btn-xs btn-primary" onclick="event.preventDefault();start_editing({{ $source->id }});" ><i class="fa fa-pencil-square-o"></i></button>
                         <button onclick="event.preventDefault();start_editing_source({{ $source->id }});"  class="d-none input_source_{{ $source->id }} btn btn-xs btn-success" ><i class="fa fa-check"></i></button>
                         <button class="d-none input_source_{{ $source->id }} btn btn-xs btn-danger" onclick="event.preventDefault();cancel_source({{ $source->id }});" ><i class="fa fa-times"></i></button>
                         <button type="submit" class="delete_source_{{ $source->id }} btn btn-xs btn-danger" formaction="{{ route('admin.lead_source.settings.delete') }}"><i class="fa fa-trash"></i></button>
                     </td>
                    

                    </form>
                 </tr>
               
             @empty
                 
             @endforelse

      
         </tbody>
     </table>
    </div>
   
      
    </div>
</div>
</div>






@push('settings')

  <script>
 function start_editing(id){
    $('.text_source_en_'+id).addClass('d-none');
    $('.text_source_ar_'+id).addClass('d-none');

    $('.text_source_'+id).addClass('d-none');
    $('.delete_source_'+id).addClass('d-none');



    $('.code_source_en_'+id).removeClass('d-none');
    $('.code_source_ar_'+id).removeClass('d-none');
    $('.input_source_'+id).removeClass('d-none');



 }


 function cancel_source(id){
     
                $('.text_source_en_'+id).removeClass('d-none');
                $('.text_source_ar_'+id).removeClass('d-none');

                $('.text_source_'+id).removeClass('d-none')
                $('.delete_source_'+id).removeClass('d-none');



                $('.code_source_en_'+id).addClass('d-none');
                $('.code_source_ar_'+id).addClass('d-none');
                $('.input_source_'+id).addClass('d-none');

 }

 function start_editing_source(id){
    $('.error-message').text('');
    if(confirm('are you sure') == true){
       
        var lead_source   = $('.code_source_en_'+id).val();
        var lead_source_ar   = $('.code_source_ar_'+id).val();
    
        $.ajax({
            url: '{{ url("admin/update_lead_source_settings") }}',
            type: 'POST',
            data: {
                _token:"{{ csrf_token() }}",
                id:id,
                lead_source:lead_source,
                lead_source_ar:lead_source_ar,
              
            },
            beforeSend: function(){
                console.log('beforeSend');
            },
            success: function(data){
             
                $('.text_source_en_'+id).text(lead_source);
                $('.text_source_ar_'+id).text(lead_source_ar);



                $('.text_source_en_'+id).removeClass('d-none');
                $('.text_source_ar_'+id).removeClass('d-none');

                $('.text_source_'+id).removeClass('d-none')
                $('.delete_source_'+id).removeClass('d-none');



                $('.code_source_en_'+id).addClass('d-none');
                $('.code_source_ar_'+id).addClass('d-none');
                $('.input_source_'+id).addClass('d-none');
                            },
            error: function(data){
                
                $('.error-message').text(data.responseJSON.message);

            }

        
        })
       



    }
 }

  </script>
 
@endpush