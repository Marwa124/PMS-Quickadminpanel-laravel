/**
 * function get data depend on client or opportunities option
 * 
 * 
 * ***/ 
function get_related_moduleName(val, proposal) {
    var url = '/admin/sales/proposals/getmodule';

  // Ajax Reuqest
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }});
            $.ajax({
                url:url,
                type:'post',
                dataType:'json',
                data:{
                    proposal: proposal,
                    id:val,
                  
                },
                context:val,
                beforeSend:function(){
                    $("#related_to").html('Loading...');
                },
                success:function(response){
                  
                    if (response) {
                        $("#related_to").html('<label for="field-1" > select '+ val + '</label>');
                        $("#related_to").append(response);
                    } else {
                        $("#related_to").empty();
                    }

               }
            });


}
/*
 * add item to table on change function
 * 
 * */ 

 function getitem(val) {
    var url = '/admin/sales/proposals/getproposalitem';

            // Ajax Reuqest
              $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }});
              $.ajax({
                  url:url,
                  type:'post',
                  dataType:'json',
                  data:{
                      id:val,
                  },
                  context:val,
                  success:function(response){
                  console.log(response);
                  $('.main ').find('input').val('');  
                    $('.main textarea[name="group_name"]').val(response.group_name);
                    $('.main input[name="brand"]').val(response.brand);
                    $('.main input[name="part"]').val(response.part);
                    $('.main input[name="delivery"]').val(response.delivery);
                    $('.main input[name="margin"]').val(response.margin);
                    $('.main input[name="total_cost_price"]').val(response.unit_cost);
                    $('.main input[name="item_name"]').val(response.name);
                    $('.main textarea[name="item_desc"]').val(response.description);
                    $('.main input[name="hsn_code"]').val(response.hsn_code);
                    $('.main input[name="new_itmes_id"]').val(val);
                    // $('.main input[name="total_qty"]').val(Math.round(response.quantity));
                    $('.main input[name="quantity"]').val(1);
                    // var taxname = response.taxname;
                    // var taxrate = response.taxrate;
                    // // if (taxname != null) {
                    // //     var tax = [];
                    // //     for (var i = 0; i < taxname.length; i++) {
                    // //         tax.push();
                    // //     }
                    // // }
                    // $('.main select[name="tax"]').children().remove();
                    // var $option = $("<option/>", {
                    //     value: response.taxes.id,
                    //     text: taxrate + '% |' + taxname
                    //   });
                    //   $('.main select[name="tax"]').append($option);
                    // $('.main input[name="unit"]').val(response.unit_type);
                    $('.main input[name="unit_cost"]').val(response.unit_cost);
                 }
                });
 }



/*
 * // CalCulate Total Edit 
 * 
 * */ 


function calculate_total_edit() {
    var calculated_tax,
        taxrate,
        item_taxes,
        row, _amount2,
        _tax_name, taxes = {},
        taxes_rows = [],
        subtotal = 0,
        total = 0,
        total_cost_price = 0,
        after_discount = 0,
        total_without_margin = 0,
        profit = 0,
        quantity = 1,
        total_discount_calculated = 0,
        rows = $('.table.invoice-items-table tbody tr.item,.table.table-main-estimate-edit tbody tr.item'),
        adjustment = $('input[name="adjustment"]').val(),
        discount_area = $('tr#discount_percent'),
        discount_percent = $('input[name="discount_percent"]').val();

        $('.tax-area').remove();

        if (discount_percent == '' || discount_percent == 0 || discount_percent == 100) {
            $('.total_after_discount').addClass('hide');
        } else {
            $('.total_after_discount').removeClass('hide');
        }

    $.each(rows, function () {
        quantity = $(this).find('[data-quantity]').val();
        margina = $(this).find('[data-edit-margin]').val();
        var total_qty = Math.round($(this).find('[data-total-qty]').val());
        var saved_items_id = Math.round($(this).find('[data-saved-items-id]').val());
        // var qty_alert = '<?= config_item('item_total_qty_alert') ?>';
        if (quantity == '') {
            quantity = 1;
        }
        if (saved_items_id != '' &&  quantity > total_qty) {
            // alert('<?= lang('exceed_stock') ?>' + ' ' + total_qty);
            quantity = total_qty;
        }

        $(this).find('[data-quantity]').val(quantity);
        _amount2 = parseFloat($(this).find('td.rate input').val()) * quantity;

        _margin = _amount2 * margina / 100;
        totaa = _margin += _amount2

        $(this).find('td.amount').html(totaa);
        subtotal += totaa;

        $(this).find('[total_cost_price]').val(_amount2);

        row = $(this);
        item_taxes = $(this).find('select.tax').selectpicker('val');
        if (item_taxes) {
            $.each(item_taxes, function (i, taxname) {
                taxrate = row.find('select.tax [value="' + taxname + '"]').data('taxrate');
                calculated_tax = (_margin * taxrate / 100);
                if (!taxes.hasOwnProperty(taxname)) {
                    if (taxrate != 0) {
                        _tax_name = taxname.split('|');
                        tax_row = '<tr class="tax-area"><td>' + _tax_name[0] + '(' + taxrate + '%)</td><td id="tax_id_' + slugify(taxname) + '"></td></tr>';
                        $("tr.total_after_discount").after(tax_row);
                        taxes[taxname] = calculated_tax;
                    }
                } else {
                    taxes[taxname] = taxes[taxname] += calculated_tax;

                }
            });
        }

        if (!taxrate) {
            total_without_margin += _amount2;
        } else {
            total_without_margin += _amount2;

        }
    });

    total_discount_calculated = (subtotal * discount_percent) / 100;

    $.each(taxes, function (taxname, total_tax) {
        total_tax_calculated = (total_tax * discount_percent) / 100;
        total_tax = (total_tax - total_tax_calculated);
        total += total_tax;
        $('#tax_id_' + slugify(taxname)).html(total_tax.toFixed(2) + hidden_input('total_tax_name[]', taxname) + hidden_input('total_tax[]', total_tax.toFixed(2)));
    });

    total = (total + subtotal);

    total = total - total_discount_calculated;
    adjustment = parseFloat(adjustment);

    if (!isNaN(adjustment)) {
        total = total + adjustment;
    }

    after_discount = subtotal - total_discount_calculated;

    $('[total_cost_price]').each(function (){
      total_cost_price += parseInt($(this).val());
    });

    console.log(total_discount_calculated);
    console.log(after_discount);
    console.log(total_cost_price);

  //  profit = after_discount - total_cost_price;

    if(after_discount > total_cost_price){
      profit = after_discount - total_cost_price;
    }else{
      profit = total_cost_price - after_discount;
    }



    $('.discount_percent').html('-' + total_discount_calculated.toFixed(2) + hidden_input('discount_percent', discount_percent) + hidden_input('discount_total', total_discount_calculated.toFixed(2)));
    if (after_discount != '') {
        $('.after_discount').html(after_discount.toFixed(2) + hidden_input('after_discount', after_discount.toFixed(2)));
    }
    $('.adjustment').html(adjustment.toFixed(2) + hidden_input('adjustment', adjustment.toFixed(2)))
    $('.subtotal').html(subtotal = subtotal.toFixed(2) + hidden_input('subtotal', subtotal.toFixed(2)));
    $('.total').html(total.toFixed(2) + hidden_input('total', total.toFixed(2)));

    $('.total_without_margin').html(total_without_margin.toFixed(2) + hidden_input('total_without_margin', total_without_margin.toFixed(2)));

    $('.profit').html(profit.toFixed(2) + " (" + ((profit * 100) / after_discount).toFixed(2) + " %)" + hidden_input('profit', profit.toFixed(2)));
}

/*
 * // Get the preview main values
 * 
 * */ 

function get_main_values() {
    var response = {};
    response.group_name = $('.main textarea[name="group_name"]').val();
    response.brand = $('.main input[name="brand"]').val();
    response.part =$('.main input[name="part"]').val();
    response.margin =$('.main input[name="delivery"]').val();
    response.delivery =$('.main input[name="margin"]').val();
    response.total_cost_price =$('.main input[name="total_cost_price"]').val();
    response.name=$('.main input[name="item_name"]').val();
    response.description=$('.main textarea[name="item_desc"]').val();
    response.hsn_code=$('.main input[name="hsn_code"]').val();
    response.id=$('.main input[name="new_itmes_id"]').val();
    response.qty =$('.main input[name="quantity"]').val();
    response.taxname =$('.main select[name="tax"]').removeAttr("selected");
    response.unit_cost=$('.main input[name="unit_cost"]').val();
    return response;
}