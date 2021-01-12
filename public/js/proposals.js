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
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            proposal: proposal,
            id: val,

        },
        context: val,
        beforeSend: function () {
            $("#related_to").html('Loading...');
        },
        success: function (response) {

            if (response) {
                $("#related_to").html('<label for="field-1" > select ' + val + '</label>');
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
        }
    });
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            id: val,
        },
        context: val,
        success: function (response) {

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
            $('.main input[name="quantity"]').val(response.quantity);
            $('.main input[name="total_qty"]').val(Math.round(response.quantity));
            if(response.margin != 0){
                var selling_Price= (response.unit_cost * response.quantity)*(response.margin/100) +(response.unit_cost * response.quantity);

            }else{
                var selling_Price= response.unit_cost * response.quantity;
                
            }

            $('.main input[name="selling_Price"]').val(selling_Price);
            var taxname = response.taxname;
            var taxrate = response.taxrate;
            if (taxname != null) {
                var tax = [];
                for (var i = 0; i < taxname.length; i++) {
                    tax.push(taxname[i] + '|' + taxrate[i]);
                }
            }
            $('.main select.tax').selectpicker('val', tax);
            $('.main input[name="unit"]').val(response.unit_type);
            $('.main input[name="unit_cost"]').val(response.unit_cost);
        }
    });
}

// Function to slug string
function slugify(string) {
    return string
        .toString()
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "-")
        .replace(/[^\w\-]+/g, "")
        .replace(/\-\-+/g, "-")
        .replace(/^-+/, "")
        .replace(/-+$/, "");
}

// Generate hidden input field
function hidden_input(name, val) {
    return '<input type="hidden" name="' + name + '" value="' + val + '">';
}


// Init bootstrap select picker
function init_selectpicker() {
    // $('.selectpicker').selectpicker('refresh');
    $('body').find('.selectpicker').selectpicker('refresh');
}
// Reoder the items in table edit for estimate and invoices
function reorder_items() {
    var rows = $('.table.invoice-items-table tbody tr.item,.table.table-main-estimate-edit tbody tr.item');
    var i = 1;
    $.each(rows, function () {
        $(this).find('input.order').val(i);
        i++;
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
    // console.log(quantity,'outside',quantity == '');
    $.each(rows, function () {
        quantity = $(this).find('[data-quantity]').val();
        margina = $(this).find('[data-edit-margin]').val();
        var total_qty = Math.round($(this).find('[data-total-qty]').val());
        var saved_items_id = Math.round($(this).find('[data-saved-items-id]').val());
        // console.log(quantity,'inside',quantity == '',quantity > total_qty,total_qty,saved_items_id,saved_items_id != null,saved_items_id != '');
        if (quantity == '') {
            quantity = 1;
        }
        // if (saved_items_id != null) {
        //     quantity = total_qty;
        // }

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

                calculated_tax = (_amount2 / 100 * taxrate);
                if (!taxes.hasOwnProperty(taxname)) {
                    if (taxrate != 0) {
                        _tax_name = taxname.split('|');
                        tax_row = '<tr class="tax-area"><td>' + _tax_name[0] + '(' + taxrate + '%)</td><td id="tax_id_' + slugify(taxname) + '"></td></tr>';
                        $("tr.total_after_discount").after(tax_row);
                        taxes[taxname] = calculated_tax;
                    }
                } else {
                    // Increment total from this tax
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

    $('[total_cost_price]').each(function () {
        total_cost_price += parseInt($(this).val());
    });

    //  profit = after_discount - total_cost_price;

    if (after_discount > total_cost_price) {
        profit = after_discount - total_cost_price;
    } else {
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
    var profitrate=((profit * 100) / after_discount).toFixed(2);
    if (isNaN(profitrate)) {
            profitrate = 0;
        }
    $('.profit').html(profit.toFixed(2) + " (" + profitrate + " %)" + hidden_input('profit', profit.toFixed(2)));
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
    //// console.log(get_main_values(),data);
    if (data.new_itmes_id != '' && data.qty > data.total_qty) {
        alert("exceed_stock" + ' ' + data.total_qty);
    } else {
        var table_row = '';
        var item_key = $('body').find('tbody .item').length + 1;
        table_row += '<tr class="sortable item" data-merge-invoice="' + merge_invoice + '">';

        // Check if quantity is number
        if (isNaN(data.qty)) {
            data.qty = 1;
        }
        // Check if rate is number
        // if (data.rate == '' || isNaN(data.rate)) {
        //     data.rate = 0;
        // }
        // Check if unit is str
        if (!data.unit || typeof (data.unit) == 'undefined') {
            data.unit = '';
        }
        // Check if rate is number
        // console.log(data,data.selling_price,data.selling_price == null || typeof (data.selling_price) == 'undefined',"data.selling_price == null ",data.selling_price == null ,"typeof (data.selling_price) == 'undefined'",typeof (data.selling_price) == 'undefined');
        if (!data.selling_Price || typeof (data.selling_Price) == 'undefined') {
            data.selling_Price = 0;
        }
        // console.log(data.selling_Price);
        var amount = data.rate * data.qty;
        amount = amount;

        var tax_name = 'items[' + item_key + '][taxname]';
        $('body').append('<div class="spinner-border dt-loader" role="status"><span class="sr-only">Loading...</span></div>');
        var regex = /<br[^>]*>/gi;

        get_taxes_dropdown_template().done(function (tax_dropdown) {
            // order input
            table_row += '<input type="hidden" class="order" name="items[' + item_key + '][order]"><input type="hidden" name="items[' + item_key + '][saved_items_id]" value="' + data.new_itmes_id + '"><input type="hidden" data-total-qty name="items[' + item_key + '][total_qty]" value="' + data.total_qty + '"><input type="hidden" data-saved-items-id name="new_itmes_id[]" value="' + data.new_itmes_id + '">';
            //  table_row += '</td>';
            table_row += '<td class="item_name"><input  name="items[' + item_key + '][item_name]" class="form-control " value="' + data.name + '"></td>';
            table_row += '<td><textarea  name="items[' + item_key + '][item_desc]" class="form-control item_item_desc" >' + data.description.replace(regex, "\n") + '</textarea></td>';
            table_row += '<td class="group_name"><input class="form-control " type="text" name="items[' + item_key + '][group_name]" id="" value="' + data.group_name + '"></td>';
            table_row += '<td><input type="number" data-parsley-type="number" min="0" onblur="calculate_total_edit();" onchange="calculate_total_edit();" data-quantity name="items[' + item_key + '][quantity]" value="' + data.qty + '" class="form-control " >';


            table_row += '</td>';
            table_row += '<td class="ratex"><input type="text" data-parsley-type="number" name="items[' + item_key + '][unit]" value="' + data.unit + '" class="form-control " ></td>';
            table_row += '<td class="ratex"><input type="text" data-parsley-type="text" name="items[' + item_key + '][brand]" value="' + data.brand + '" class="form-control " ></td>';
            table_row += '<td class="ratex"><input type="text" data-parsley-type="text" name="items[' + item_key + '][part]" value="' + data.part + '" class="form-control " ></td>';

            if (data.selling_Price != 0) {

                table_row += '<td class="rate"><input type="number" data-parsley-type="number" value="' + data.unit_cost + '" class="form-control  w-auto" onblur="calculate_total_edit();" onchange="calculate_total_edit();" name="items[' + item_key + '][unit_cost]"></td>';
                table_row += '<td class="total_cost_price"><input type="text" name="items[' + item_key + '][total_cost_price]" value="' + data.total_cost_price + '" onblur="calculate_total_edit();" onchange="calculate_total_edit();" total_cost_price placeholder="Total Cost Price" class="form-control " readonly/></td>';
                table_row += '<td class="margin"><input type="text" name="items[' + item_key + '][margin]" value="' + data.margin + '" onblur="calculate_total_edit();" onchange="calculate_total_edit();" data-edit-margin placeholder="Margin" class="form-control "/></td>';
                table_row += '<td class="rateee"> <input type="text" data-parsley-type="number"  onblur="calculate_total_edit();" onchange="calculate_total_edit();" name="items[' + item_key + '][selling_price]" value="' + data.selling_Price + '" class="form-control " readonly> </td>';
                table_row += '<td class="ratex"><input type="text" data-parsley-type="text" name="items[' + item_key + '][delivery]" value="' + data.delivery + '" class="form-control " ></td>';
            } else {
                //  table_row += '<td class="ratex"><input type="text" data-parsley-type="number" onblur="calculate_total();" onchange="calculate_total();" name="items[' + item_key + '][unit_cost]" value="' + data.rate + '" class="form-control " ></td>';
                table_row += '<td class="rate"> <input type="number" data-parsley-type="number" onblur="calculate_total();" onchange="calculate_total();" name="items[' + item_key + '][unit_cost]" value="' + data.unit_cost + '" class="form-control "/> </td>';
                table_row += '<td class="total_cost_price"><input type="text" name="items[' + item_key + '][total_cost_price]" value="' + data.total_cost_price + '" onblur="calculate_total_edit();" onchange="calculate_total_edit();" total_cost_price placeholder="Total Cost Price" class="form-control " readonly/></td>';
                table_row += '<td class="margin"><input type="text" name="items[' + item_key + '][margin]" value="' + data.margin + '" onblur="calculate_total_edit();" onchange="calculate_total_edit();" data-edit-margin placeholder="Margin" class="form-control "/></td>';
                table_row += '<td class="rateee"> <input type="text" data-parsley-type="number"  onblur="calculate_total_edit();" onchange="calculate_total_edit();" name="items[' + item_key + '][selling_price]" value="' + data.selling_Price + '" class="form-control " readonly> </td>';
                // table_row += '<td class="rate"> <input type="text" data-parsley-type="number"  onblur="calculate_total();" onchange="calculate_total();" name="items[' + item_key + '][unit_cost]" value="' +  data.unit_cost + '" class="form-control "> </td>';
                table_row += '<td class="ratex"><input type="text" data-parsley-type="text" name="items[' + item_key + '][delivery]" value="' + data.delivery + '" class="form-control " ></td>';
            }

            var taxnamearray = [];
            $.each(data.taxname, function (i, __taxname) {
                _tax_name = __taxname.split('|');
                taxnamearray.push(Math.round(_tax_name[0]));
            });
            if (tax_dropdown != null) {
                var tax = [];
                for (var i = 0; i < tax_dropdown.length; i++) {

                    if (taxnamearray.includes(tax_dropdown[i].rate_percent)) {

                        $option = '<option value="' + tax_dropdown[i]['name'] + '" selected data-taxrate="' + tax_dropdown[i]['rate_percent'] + '" data-taxname="' + tax_dropdown[i]['name'] + '" data-subtext="' + tax_dropdown[i]['name'] + '">' + tax_dropdown[i]['rate_percent'] + '% |' + tax_dropdown[i]['name'] + '</option>'

                    } else {

                        $option = '<option value="' + tax_dropdown[i]['name'] + '"  data-taxrate="' + tax_dropdown[i]['rate_percent'] + '" data-taxname="' + tax_dropdown[i]['name'] + '" data-subtext="' + tax_dropdown[i]['name'] + '">' + tax_dropdown[i]['rate_percent'] + '% |' + tax_dropdown[i]['name'] + '</option>'
                    }
                    tax.push($option);

                }
            }

            table_row += '<td class="taxrate"><select class="selectpicker display-block tax" name="tax[]" multiple data-none-selected-text="no_tax" >' + tax + '</select></td>';

            table_row += '<td class="amount">' + amount + '</td>';
            table_row += '<td><a href="#" class="btn-xs btn btn-danger pull-left" onclick="delete_item(this,' + itemid + '); return false;"><i class="fa fa-trash"></i></a></td>';
            table_row += '</tr>';

            $('table.items tbody').append(table_row);

            setTimeout(function () {
                calculate_total_edit();
            }, 10);

            init_selectpicker();
            clear_main_values();
            reorder_items();

            return true;
        });
    }
    return false;
}

// Get taxes dropdown selectpicker template / Causing problems with ajax becuase is fetching from server
function get_taxes_dropdown_template() {
    var url = '/admin/sales/proposals/get_taxes';
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false
    });
    var d = $.post(url);

    jQuery.ajaxSetup({
        async: true
    });

    return d;
}


function clear_main_values() {

    $('body').find('.main input[name="group_name"]').val('');
    $('body').find('.main input[name="brand"]').val('');
    $('body').find('.main input[name="part"]').val('');
    $('body').find('.main input[name="margin"]').val('');
    $('body').find('.main input[name="delivery"]').val('');
    $('body').find('.main input[name="total_cost_price"]').val('');
    $('body').find('.main input[name="selling_Price"]').val('');
    $('body').find('.main input[name="item_name"]').val('');
    $('body').find('.main textarea[name="item_desc"]').val('');
    $('body').find('.main input[name="hsn_code"]').val('');
    $('body').find('.main input[name="new_itmes_id"]').val('');
    $('body').find('.main input[name="quantity"]').val('');
    $('body').find('.main input[name="unit_cost"]').val('');
    $('body').find('.main input[name="total_qty"]').val('');
    return true;
}

function get_main_values() {
    var response = {};
    response.group_name = $('.main input[name="group_name"]').val();
    response.brand = $('.main input[name="brand"]').val();
    response.part = $('.main input[name="part"]').val();
    response.margin = $('.main input[name="margin"]').val();
    response.delivery = $('.main input[name="delivery"]').val();
    response.total_cost_price = $('.main input[name="total_cost_price"]').val();
    response.selling_Price = $('.main input[name="selling_Price"]').val();
    response.name = $('.main input[name="item_name"]').val();
    response.description = $('.main textarea[name="item_desc"]').val();
    response.hsn_code = $('.main input[name="hsn_code"]').val();
    response.new_itmes_id = $('.main input[name="new_itmes_id"]').val();
    response.qty = $('.main input[name="quantity"]').val();
    response.taxname = $('.main select.tax').selectpicker('val');
    response.rate = $('.main select[name="tax[]"] option:selected').data('taxrate');
    // console.log(response.rate);
    response.unit_cost = $('.main input[name="unit_cost"]').val();
    response.total_qty =$('.main input[name="quantity"]').val();
    return response;
}

// Recaulciate total on these changes
$('body').on('change', 'input[name="adjustment"],select.tax', function () {
    calculate_total_edit();
});

// Discount type for estimate/invoice
$('body').on('change', 'select[name="discount_type"]', function () {
    // if discount_type == ''
    if ($(this).val() == '') {
        $('input[name="discount_percent"]').val(0);
    }
    // Recalculate the total
    calculate_total_edit();
});

// In case user enter discount percent but there is no discount type set
$('body').on('change', 'input[name="discount_percent"]', function () {
    if ($('select[name="discount_type"]').val() == '' && $(this).val() != 0) {
        alert('You need to select discount type');
        $('html,body').animate({
                scrollTop: 50
            },
            'slow');
        $('label[for="discount_type"]').addClass('text-danger');
        setTimeout(function () {
            $('label[for="discount_type"]').removeClass('text-danger');
        }, 3000);
        return false;
    }
    // console.log(this);
    // if ($(this).valid() == true) {
        calculate_total_edit();
    // }
});