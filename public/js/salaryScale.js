$(document).ready(function () {

    var allowanceId = 0;
    var allowancesLabels = [];

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
        
        var uniqueAllowanceLabels = moreAllowanceLabels.filter(function(item, i, moreAllowanceLabels) {
            return i == moreAllowanceLabels.indexOf(item);
        });

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
                <input class="form-control w-50" placeholder="Enter Allowance Value" type="number" min="0" name="allowanceValue[]" value="0" required>
            </div>
        `);
        
        $("input[name='allowanceValue[]']").focusout(function(){
            var labelValue = $(this).closest('.form-group').find('input[name="allowanceLabel[]"]').val();
            console.log(labelValue);
            allowancesLabels.push(labelValue);
            console.log(allowancesLabels);

            $(this).attr('name', 'allowance[' + labelValue + ']'); // Change the attribute name of label allowance
            var allowanceMore = moreAllowances(allowancesLabels);

            $('input[name="gross_salary"]').val(totalGross());
            $('#net_salary').val(netSalary());
        })

        $('.removeAllowance').on('click', function(){
            $(this).closest('.form-group').remove();
        })
    })




});