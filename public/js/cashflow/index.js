$("input").keyup(function (e) {
    // set income value
    $("#income").val(
        $("#production").val() * 10
    );

    // set net income value
    $("#depreciation").val(
        ($("#income").val() - $("#opex").val()) * parseInt($("#project-depreciation").html()) / 100
    );

    // set taxable income
    $("#taxable_income").val(
        $("#income").val() - $("#opex").val() - $("#depreciation").val()
    );

    // set taxable income
    $("#tax").val(
        $("#taxable_income").val() * parseInt($("#project-tax").html()) / 100
    );

    // set taxable income
    $("#net_cashflow").val(
        $("#taxable_income").val() - $("#tax").val()
    );
})