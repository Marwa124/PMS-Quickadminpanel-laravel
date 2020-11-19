$(document).ready(function () {

    var allowanceId = 0;
    var allowancesLabels = [];
    var oldLabelVal = '';

    // var grossSalary = parseInt($('input[name="gross_salary"]').val());
    $("input[name='basic_salary']").change(function(){
        $('input[name="gross_salary"]').val(totalGross());
        $('#net_salary').val(netSalary());
    })
    
    $("input[name='allowance[house_allowance]']").focusout(function(){
        $('input[name="gross_salary"]').val(totalGross());
        $('#net_salary').val(netSalary());
    })
    $("input[name='allowance[medical_allowance]']").focusout(function(){
        $('input[name="gross_salary"]').val(totalGross());
        $('#net_salary').val(netSalary());
    })

    $("input[name='deduction[provided_fund]']").focusout(function(){
        $('#total_deduction').val(totalDeductions());
        $('#net_salary').val(netSalary());
    })
    $("input[name='deduction[tax_deduction]']").focusout(function(){
        $('#total_deduction').val(totalDeductions());
        $('#net_salary').val(netSalary());
    })


    function totalGross() {
        var basicSalary = parseInt($("input[name='basic_salary']").val());
        var allowanceHouse = parseInt($("input[name='allowance[house_allowance]']").val());
        var allowanceTax = parseInt($("input[name='allowance[medical_allowance]']").val());
        
        var allowanceMore = moreAllowances(allowancesLabels);
        
        return basicSalary + allowanceHouse + allowanceTax + allowanceMore; 
    }

    function moreAllowances(moreAllowanceLabels = []) {
        var moreAllowances = 0; 
        
        var uniqueAllowanceLabels = [];
        $.each(moreAllowanceLabels, function(i, el){
            if($.inArray(el, uniqueAllowanceLabels) === -1) uniqueAllowanceLabels.push(el);
        });


        // var uniqueAllowanceLabels = moreAllowanceLabels.filter(function(item, i, moreAllowanceLabels) {
        //     return i == moreAllowanceLabels.indexOf(item);
        // });

        uniqueAllowanceLabels.forEach(element => {
            moreAllowances += parseInt($("input[name='allowance["+element+"]']").val());
        });
        return moreAllowances;
    }

    function totalDeductions() {
        var deductionFund = parseInt($("input[name='deduction[provided_fund]']").val());
        var deductionTax = parseInt($("input[name='deduction[tax_deduction]']").val());
        return deductionFund + deductionTax; 
    }

    function netSalary()
    {
        return totalGross() - totalDeductions();
    }

    // !!!: More Allowances Button
    $('.moreAllowances').on('click', function(){
        allowanceId +=1;
        $('.allowancesGroup').append(`
            <div class="form-group" id="allowance${allowanceId}">
                <div class="d-flex justify-content-between">
                    <input class="form-control w-50" placeholder="Enter Allowance Name" type="text" name="allowanceLabel[]" value="" required>
                    <a href="javascript:void(0)" class="removeAllowance text-danger"><i class="fas fa-remove"></i>Remove</a>
                </div>
                <input class="form-control w-50" placeholder="Enter Allowance Value" type="number" min="0" name="allowanceValue[]" value="0" required disabled>
            </div>
        `);

        // Disable The value input till user enter the label name first
        $("input[type='text']").focusout(function(){
        // $("input[name='allowanceLabel[]']").focusout(function(){
            if ($('input[name="allowanceLabel[]"]').val() != '') {
                $("input[name='allowanceValue[]']").attr('disabled', false);

                var labelName = $(this).val();
                if (oldLabelVal) {

                    allowancesLabels.shift(oldLabelVal);
                }
                allowancesLabels.push(labelName);
    
                // If the label name has changed then the value name must be change to before inserted in the db.
                $(this).closest('.form-group').find('input[type="number"]').attr('name', 'allowance[' + labelName + ']');
            }
        })

        $("input[type='text']").change(function(){
            oldLabelVal = $(this).val();
        })


        $("input[type='number']").focusout(function(){
        // $("input[name='allowanceValue[]']").focusout(function(){
            if ($('input[name="allowanceLabel[]"]').val()) {
                var labelValue = $(this).closest('.form-group').find('input[name="allowanceLabel[]"]').val();
            }else{
                var labelValue = $(this).closest('.form-group').find('input[type="text"]').val();
            }
            console.log(allowancesLabels);

            $(this).attr('name', 'allowance[' + labelValue + ']'); // Change the attribute name of label allowance
            var allowanceMore = moreAllowances(allowancesLabels);

            $('input[name="gross_salary"]').val(totalGross());
            $('#net_salary').val(netSalary());
        })

        // Remove btn       
        $('.removeAllowance').on('click', function(){
            $('.removeAllowance').attr('disabled', true);
            var labelName = $(this).closest('.form-group').find('input[type="text"]').val();

            allowancesLabels.shift(labelName);
            
            allowanceMore = moreAllowances(allowancesLabels);
            $('input[name="gross_salary"]').val(totalGross());
            $('#net_salary').val(netSalary());

            $(this).closest('.form-group').remove();
        })
    })


});