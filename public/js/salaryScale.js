$(document).ready(function () {

    var allowanceId = 0;
    var allowancesLabels = [];
    var oldLabelVal = '';
    ////////// Deductions /////////////
    var deductionId = 0;
    var deductionsLabels = [];
    var oldDeductionLabelVal = '';

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
        var basicSalary      = parseInt($("input[name='basic_salary']").val());
        var allowanceHouse   = parseInt($("input[name='allowance[house_allowance]']").val() ?? 0);
        var allowanceMedical = parseInt($("input[name='allowance[medical_allowance]']").val() ?? 0);

        var allowanceMore = moreAllowances(allowancesLabels);

        var sum = 0;
        if (window.location.href.indexOf("edit") > -1) {
            var allowanceHouse = 0 ;
            var allowanceMedical = 0 ;
            var allowanceMore = 0;
            $('.allowanceValue').each((i, elem) => {
                sum += parseInt(elem.value ?? 0);
            })
        }
        console.log(basicSalary , allowanceHouse , allowanceMedical , allowanceMore , sum);
        return basicSalary + allowanceHouse + allowanceMedical + allowanceMore + sum;
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
console.log(uniqueAllowanceLabels, moreAllowanceLabels);
        uniqueAllowanceLabels.forEach(element => {
            moreAllowances += parseInt($("input[name='allowance["+element+"]']").val());
            console.log(moreAllowances, 'moreAllowances');

        });
        return moreAllowances;
    }

    function moreDeductions(moreDeductionLabels = []) {
        var moreDeductions = 0;

        var uniqueDeductionLabels = [];
        $.each(moreDeductionLabels, function(i, el){
            if($.inArray(el, uniqueDeductionLabels) === -1) uniqueDeductionLabels.push(el);
        });

        uniqueDeductionLabels.forEach(element => {
            moreDeductions += parseInt($("input[name='deduction["+element+"]']").val());
            console.log(parseInt($("input[name='deduction["+element+"]']").val()));
        });
        return moreDeductions;
    }

    function totalDeductions() {
        var deductionFund = parseInt($("input[name='deduction[provided_fund]']").val() ?? 0);
        var deductionTax = parseInt($("input[name='deduction[tax_deduction]']").val() ?? 0);

        var deductionMore = moreDeductions(deductionsLabels);

        var sum = 0;
        if (window.location.href.indexOf("edit") > -1) {
            var deductionFund = 0
            var deductionTax = 0
            var deductionMore = 0

            $('.deductionValue').each((i, elem) => {
                sum += parseInt(elem.value ?? 0);
                // console.log(sum, i, elem.name);
            })
        }

        console.log(deductionFund , deductionTax , deductionMore , sum);
        return deductionFund + deductionTax + deductionMore + sum;
    }

    function netSalary()
    {
        return totalGross() - totalDeductions();
    }


    // !!!: Totals Section /////////////
    $(".allowanceValue").focusout(function(){
        if ($('input[name="allowanceLabel[]"]').val()) {
            var labelValue = $(this).closest('.form-group').find('input[name="allowanceLabel[]"]').val();
        }else{
            var labelValue = $(this).closest('.form-group').find('.allowanceLabel').val();
        }

        $(this).attr('name', 'allowance[' + labelValue + ']'); // Change the attribute name of label allowance
        var allowanceMore = moreAllowances(allowancesLabels);

        $('input[name="gross_salary"]').val(totalGross());
        $('#net_salary').val(netSalary());
    })

    // $(".deductionValue").focusout(function(e){
    $("body").on('focusout','.deductionValue', function(e){

        // if(!$(this).hasClass('moreClickDeduct')) {
            if ($('input[name="deductionLabel[]"]').val()) {
                var deductionLabelValue = $(this).closest('.form-group').find('input[name="deductionLabel[]"]').val();
            }else{
                var deductionLabelValue = $(this).closest('.form-group').find('.deductionLabel').val();
            }

            $(this).attr('name', 'deduction[' + deductionLabelValue + ']'); // Change the attribute name of label deduction
            var deductionMore = moreDeductions(deductionsLabels);

            $('#total_deduction').val(totalDeductions());
            $('#net_salary').val(netSalary());
        // }
    })
    // !!!: Totals Section /////////////


    // !!!: More Allowances Button /////////////////////////////
    $('.moreAllowances').on('click', function(){
        var prev = '';
        var current = '';

        allowanceId +=1;
        $('.allowancesGroup').append(`
            <div class="form-group" id="allowance${allowanceId}">
                <div class="d-flex justify-content-between">
                    <input class="form-control w-50 allowanceLabel" placeholder="Enter Allowance Name" type="text" name="allowanceLabel[]" value="" required>
                    <a href="javascript:void(0)" class="removeAllowance text-danger"><i class="fas fa-remove"></i>Remove</a>
                </div>
                <input class="form-control w-50 allowanceValue" placeholder="Enter Allowance Value" type="number" min="0" name="allowanceValue[]" value="0" required disabled>
            </div>
        `);

        // Disable The value input till user enter the label name first
        $(".allowanceLabel").focusout(function(){
        // $("input[name='allowanceLabel[]']").focusout(function(){
            if ($('input[name="allowanceLabel[]"]').val() != '') {
                $("input[name='allowanceValue[]']").attr('disabled', false);

                var labelName = $(this).val();
                if (prev) {
                    allowancesLabels.shift(prev);
                }
                allowancesLabels.push(labelName);

                // If the label name has changed then the value name must be change to before inserted in the db.
                $(this).closest('.form-group').find('input[type="number"]').attr('name', 'allowance[' + labelName + ']');
            }
        })

        ///////////// Fetch Old label Value before change//////////////////
        $('.allowanceLabel').on('focusin', function(){
            $(this).data('val', $(this).val());
        });

        $('.allowanceLabel').on('change', function(){
            var prev = $(this).data('val');
            var current = $(this).val();
            console.log("Prev value " + prev);
            console.log("New value " + current);
        });
        ///////////// Fetch Old label Value before change///////////////////


        // $(".allowanceLabel").change(function(){
        //     oldLabelVal = $(this).val();
        // })


        $(".allowanceValue").focusout(function(){
            if ($('input[name="allowanceLabel[]"]').val()) {
                var labelValue = $(this).closest('.form-group').find('input[name="allowanceLabel[]"]').val();
            }else{
                var labelValue = $(this).closest('.form-group').find('.allowanceLabel').val();
            }

            $(this).attr('name', 'allowance[' + labelValue + ']'); // Change the attribute name of label allowance
            var allowanceMore = moreAllowances(allowancesLabels);

            $('input[name="gross_salary"]').val(totalGross());
            $('#net_salary').val(netSalary());
        })

        // Remove btn
        $('.removeAllowance').on('click', function(){
            $('.removeAllowance').attr('disabled', true);
            var labelName = $(this).closest('.form-group').find('.allowanceLabel').val();
            console.log(labelName, allowancesLabels);
            allowancesLabels.splice($.inArray(labelName, allowancesLabels),1);
            // allowancesLabels.shift(labelName);

            allowanceMore = moreAllowances(allowancesLabels);
            // console.log( allowancesLabels);
            console.log(allowanceMore, allowancesLabels);
            $('input[name="gross_salary"]').val(totalGross());
            $('#net_salary').val(netSalary());

            $(this).closest('.form-group').remove();
        })
    })

    // !!!: Deduction Card /////////////////////////////////////////////////////////////////////////////////
    // !!!: More Deductions Button
        $('.moreDeductions').on('click', function(){
            deductionId +=1;
            $('.deductionsGroup').append(`
                <div class="form-group" id="deduction${deductionId}">
                    <div class="d-flex justify-content-between">
                        <input class="form-control w-50 deductionLabel" placeholder="Enter Deduction Name" type="text" name="deductionLabel[]" value="" required>
                        <a href="javascript:void(0)" class="removeDeduction text-danger"><i class="fas fa-remove"></i>Remove</a>
                    </div>
                    <input class="form-control w-50 deductionValue" placeholder="Enter Deduction Value" type="number" min="0" name="deductionValue[]" value="0" required disabled>
                </div>
            `);

            // Disable The value input till user enter the label name first
            $(".deductionLabel").focusout(function(){
            // $("input[name='deductionLabel[]']").focusout(function(){
                if ($('input[name="deductionLabel[]"]').val() != '') {
                    $("input[name='deductionValue[]']").attr('disabled', false);

                    var deductionLabelName = $(this).val();
                    if (oldDeductionLabelVal) {
                        deductionsLabels.shift(oldDeductionLabelVal);
                    }
                    deductionsLabels.push(deductionLabelName);

                    // If the label name has changed then the value name must be change to before inserted in the db.
                    $(this).closest('.form-group').find('input[type="number"]').attr('name', 'deduction[' + deductionLabelName + ']');
                }
            })

            $(".deductionLabel").change(function(){
                oldDeductionLabelVal = $(this).val();
            })


            $(".deductionValue").focusout(function(){
                if ($('input[name="deductionLabel[]"]').val()) {
                    var deductionLabelValue = $(this).closest('.form-group').find('input[name="deductionLabel[]"]').val();
                }else{
                    var deductionLabelValue = $(this).closest('.form-group').find('.deductionLabel').val();
                }

                $(this).attr('name', 'deduction[' + deductionLabelValue + ']'); // Change the attribute name of label deduction
                var deductionMore = moreDeductions(deductionsLabels);

                $('#total_deduction').val(totalDeductions());
                $('#net_salary').val(netSalary());
            })

            // Remove btn
            $('.removeDeduction').on('click', function(){
                $('.removeDeduction').attr('disabled', true);
                var deductionLabelName = $(this).closest('.form-group').find('.deductionLabel').val();

                deductionsLabels.shift(deductionLabelName);

                deductionMore = moreDeductions(deductionsLabels);
                $('#total_deduction').val(totalDeductions());
                $('#net_salary').val(netSalary());

                $(this).closest('.form-group').remove();
            })
        })


    /* !!!: Total Salary ****************************/
    $('input[name="gross_salary"]').val(totalGross());
    $('#total_deduction').val(totalDeductions());
    $('#net_salary').val(netSalary());
});
