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
                //   console.log(response.group_name);
                  $('.main ').find('input').val('');  
                    $('.main input[name="group_name"]').val(response.group_name);
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
            $('.total_after_discount').addClass('d-none');
        } else {
            $('.total_after_discount').removeClass('d-none');
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
    // Append the added items to the preview to the table as items
    function add_item_to_table(data, itemid, merge_invoice) {
        // If not custom data passed get from the preview
        if (typeof (data) == 'undefined' || data == 'undefined') {
            data = get_main_values();
        }
        // console.log(data,data.group_name, data.name);
        // var qty_alert = '<?= config_item('item_total_qty_alert') ?>';
        if (data.new_itmes_id != '' && data.qty > data.total_qty) {
            alert("exceed_stock" + ' ' + data.total_qty);
        } else {
            var table_row = '';
            var unit_placeholder = '';
            var item_key = $('body').find('tbody .item').length + 1;
            table_row += '<tr class="sortable item" data-merge-invoice="' + merge_invoice + '">';
            //  table_row += '<td class="dragger">';
            // Check if quantity is number
            if (isNaN(data.qty)) {
                data.qty = 1;
            }
            // Check if rate is number
            if (data.rate == '' || isNaN(data.rate)) {
                data.rate = 0;
            }

            var amount = data.rate * data.qty;
            amount = amount;
            console.log(data,data.group_name, data.name);
            //
            // var total = parseFloat(cost_price * margin / 100);
            // var ex = parseFloat(cost_price,2) + parseFloat(total,2);
            //  var selling_price= $('name="items[' + item_key + '][selling_price]""]').val(amount);

            var tax_name = 'items[' + item_key + '][taxname][]';
            $('body').append('<div class="spinner-border dt-loader" role="status"><span class="sr-only">Loading...</span></div>');
            var regex = /<br[^>]*>/gi;

            // get_taxes_dropdown_template(tax_name, data.taxname).done(function (tax_dropdown) {
                // order input
                table_row += '<input type="hidden" class="order" name="items[order][]"><input type="hidden" name="items[saved_items_id][]" value="' + data.new_itmes_id + '"><input type="hidden" data-total-qty name="items[total_qty][]" value="' + data.total_qty + '"><input type="hidden" data-saved-items-id name="new_itmes_id[]" value="' + data.new_itmes_id + '">';
                //  table_row += '</td>';
                table_row += '<td class="item_name"><textarea  name="items[item_name][]" class="form-control">' + data.name + '</textarea></td>';
                table_row += '<td><textarea  name="items[item_desc][]" class="form-control item_item_desc" >' + data.description.replace(regex, "\n") + '</textarea></td>';
                table_row += '<td class="group_name"><input class="form-control" type="text" name="items[group_name][]" id="" value="'+ data.group_name + '"></td>';
                // <?php $invoice_view = config_item('invoice_view');
                // if (!empty($invoice_view) && $invoice_view == '2') {
                //     ?>
                //                     table_row += '<td><input type="text" name="items[hsn_code][]" class="form-control" value="' + data.hsn_code + '"></td>';
                // <?php } ?>
                table_row += '<td><input type="text" data-parsley-type="number" min="0" onblur="calculate_total_edit();" onchange="calculate_total_edit();" data-quantity name="items[quantity][]" value="' + data.qty + '" class="form-control" >';
                unit_placeholder = '';
                if (!data.unit || typeof (data.unit) == 'undefined') {
                    data.unit = '';
                }
                table_row += '</td>';
                table_row += '<td class="ratex"><input type="text" data-parsley-type="number" name="items[' + item_key + '][unit]" value="' + data.unit + '" class="form-control" ></td>';
                table_row += '<td class="ratex"><input type="text" data-parsley-type="text" name="items[' + item_key + '][brand]" value="' + data.brand + '" class="form-control" ></td>';
                table_row += '<td class="ratex"><input type="text" data-parsley-type="text" name="items[' + item_key + '][part]" value="' + data.part + '" class="form-control" ></td>';

                if (data.selling_price != 0) {
                    table_row += '<td class="rate"><input type="text" data-parsley-type="number" value="' + data.rate + '" class="form-control" onblur="calculate_total_edit();" onchange="calculate_total_edit();" name="items[' + item_key + '][unit_cost]"></td>';
                    table_row += '<td class="total_cost_price"><input type="text" name="items[' + item_key + '][total_cost_price]" value="' + data.total_cost_price + '" onblur="calculate_total_edit();" onchange="calculate_total_edit();" total_cost_price placeholder="Total Cost Price" class="form-control" readonly/></td>';
                    table_row += '<td class="margin"><input type="text" name="items[' + item_key + '][margin]" value="' + data.margin + '" onblur="calculate_total_edit();" onchange="calculate_total_edit();" data-edit-margin placeholder="Margin" class="form-control"/></td>';
                    table_row += '<td class="rateee"> <input type="text" data-parsley-type="number"  onblur="calculate_total_edit();" onchange="calculate_total_edit();" name="items[' + item_key + '][selling_price]" value="' + data.selling_price + '" class="form-control" gh> </td>';
                    table_row += '<td class="ratex"><input type="text" data-parsley-type="text" name="items[' + item_key + '][delivery]" value="' + data.delivery + '" class="form-control" ></td>';
                } else {
                    //  table_row += '<td class="ratex"><input type="text" data-parsley-type="number" onblur="calculate_total();" onchange="calculate_total();" name="items[' + item_key + '][unit_cost]" value="' + data.rate + '" class="form-control" ></td>';
                    table_row += '<td class="rate"> <input type="text" data-parsley-type="number" onblur="calculate_total();" onchange="calculate_total();" name="items[' + item_key + '][unit_cost]" value="' + data.rate + '" class="form-control"/> </td>';
                    table_row += '<td class="total_cost_price"><input type="text" name="items[' + item_key + '][total_cost_price]" value="' + data.total_cost_price + '" onblur="calculate_total_edit();" onchange="calculate_total_edit();" total_cost_price placeholder="Total Cost Price" class="form-control" readonly/></td>';
                    table_row += '<td class="margin"><input type="text" name="items[' + item_key + '][margin]" value="' + data.margin + '" onblur="calculate_total_edit();" onchange="calculate_total_edit();" data-edit-margin placeholder="Margin" class="form-control"/></td>';
                    table_row += '<td class="rate"> <input type="text" data-parsley-type="number"  onblur="calculate_total();" onchange="calculate_total();" name="items[' + item_key + '][unit_cost]" value="' + data.rate + '" class="form-control"> </td>';
                    table_row += '<td class="ratex"><input type="text" data-parsley-type="text" name="items[' + item_key + '][delivery]" value="' + data.delivery + '" class="form-control" ></td>';
                }

                // table_row += '<td class="taxrate">' + tax_dropdown + '</td>';
                table_row += '<td class="amount">' + amount + '</td>';
                table_row += '<td><a href="#" class="btn-xs btn btn-danger pull-left" onclick="delete_item(this,' + itemid + '); return false;"><i class="fa fa-trash"></i></a></td>';
                table_row += '</tr>';

                $('table.items tbody').append(table_row);

                // setTimeout(function () {
                //     calculate_total_edit();
                // }, 10);

                // init_selectpicker();
                // clear_main_values();
                // reorder_items();

                $('body').find('.dt-loader').remove();
                $('#item_select').selectpicker('val', '');
                return true;
            // });
        }
        return false;
    }

 // Get taxes dropdown selectpicker template / Causing problems with ajax becuase is fetching from server
 function get_taxes_dropdown_template(name, taxname) {

    jQuery.ajaxSetup({
        async: false
    });
    var d = $.post('<?= base_url() ?>admin/global_controller/get_taxes_dropdown', {
        name: name,
        taxname: taxname
    });

    jQuery.ajaxSetup({
        async: true
    });

    return d;
    }

    
function get_main_values() {
    var response = {};
    response.group_name = $('.main input[name="group_name"]').val();
    response.brand = $('.main input[name="brand"]').val();
    response.part =$('.main input[name="part"]').val();
    response.margin =$('.main input[name="delivery"]').val();
    response.delivery =$('.main input[name="margin"]').val();
    response.total_cost_price =$('.main input[name="total_cost_price"]').val();
    response.selling_Price =$('.main input[name="selling_Price"]').val();
    response.name=$('.main input[name="item_name"]').val();
    response.description=$('.main textarea[name="item_desc"]').val();
    response.hsn_code=$('.main input[name="hsn_code"]').val();
    response.id=$('.main input[name="new_itmes_id"]').val();
    response.qty =$('.main input[name="quantity"]').val();
    response.taxname =$('.main select[name="tax"]').removeAttr("selected");
    response.unit_cost=$('.main input[name="unit_cost"]').val();
    return response;
}