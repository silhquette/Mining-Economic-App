$("input").keyup(function (e) {
    // set income value
    $("#income").val(
        $("#production").val() * 10
    );

    // set net income value
    $("#net_income").val(
        ($("#income").val() - $("#opex").val()) * (1 - $("#depreciation").val() / 100)
    );

    // set taxable income
    $("#taxable_income").val(
        $("#net_income").val() * $("#tax").val() / 100
    );

    // set taxable income
    $("#net_cashflow").val(
        $("#net_income").val() - $("#taxable_income").val()
    );
})