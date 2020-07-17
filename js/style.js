
$(function () {


    // フリーワード検索用
    for (let i = 1; i <= 10; i++){
        $('#autocomplete' + i).autocomplete({
            source: foodList1,
            autoFocus: true,
            delay: 300,
        });
    };

    //     // 参考URLhttp://arikalog.hateblo.jp/entry/2015/12/25/012829


    for (let i = 1; i <= 10; i++){
        $(".g" + i).change(function () {
            let food_name = $("#autocomplete" + i).val();
            console.log(i);
            let g = $(".g" + i).val() / 100;
            $(".foodName" + i).val(food_name);
            $(".enerc_kcal" + i).val(foodList2[food_name].enerc_kcal * g);
            $(".protein" + i).val(foodList2[food_name].protein * g);
            $(".lipid" + i).val(foodList2[food_name].lipid * g);
            $(".carbohydrate" + i).val(foodList2[food_name].carbohydrate * g);
            $(".fibtg" + i).val(foodList2[food_name].fibtg * g);
            $(".ca" + i).val(foodList2[food_name].ca * g);
            $(".fe" + i).val(foodList2[food_name].fe * g);
            $(".vita_rae" + i).val(foodList2[food_name].vita_rae * g);
            $(".vitd" + i).val(foodList2[food_name].vitd * g);
            $(".vitk" + i).val(foodList2[food_name].vitk * g);
            $(".thiahcl" + i).val(foodList2[food_name].thiahcl * g);
            $(".ribf" + i).val(foodList2[food_name].ribf * g);
            $(".vitc" + i).val(foodList2[food_name].vitc * g);
            $(".nacl_eq" + i).val(foodList2[food_name].nacl_eq * g);
            console.log(foodList2[food_name].enerc_kcal * g);
        });
    };
    $(".result").val();
});



