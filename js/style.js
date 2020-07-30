$(function () {

    // for (let i = 1; i <= 10; i++){

    //     $('#autocomplete' + i).on('keyup', function () {
    //         console.log($(this).val());
    //         const searchWord = $(this).val();
    //         const requestUrl = 'ajax_get.php';
    //         axios.get(`${requestUrl}?searchword=${searchWord}`)
    //         .then(function (response) {
    //             // console.log(response);
    //             // console.log(response.data[0].todo);
    //             // let arr = [];
    //             // for (let i = 0; i < response.data.length; i++) {
    //             //     let a = `<tr><td>${response.data[i].foodName}</td><td>${response.data[i].foodNum}</td></tr>`;
    //                 // arr.push(a);
    //                 // console.log(response.data[i].foodName);
    //                 // console.log(arr);
    //                 // $('tbody').html(arr);
    //             }
    //         });
    //     });
    // };


    $('.1').on('click', function () {
        $('.enerc_kcal').toggle();
    });

    // $('.2').on('click', function () {
    //     $('.protein').hide();
    // });



    // フリーワード検索用
    for (let i = 0; i < $('.search').length; i++) {
        $('#autocomplete' + i).autocomplete({
            source: foodList1,
            autoFocus: true,
            delay: 300,
        });
    };

    //     // 参考URLhttp://arikalog.hateblo.jp/entry/2015/12/25/012829

    // セレクトした項目をキーワードに数値を引っ張ってくるよう
    // toFixedで小数点を調整
    for (let i = 0; i < $('.search').length; i++) {
        $(".g" + i).change(function () {
            if ($('.g' + i).val() >= 0) {
                let food_name = $("#autocomplete" + i).val();
                let g = $(".g" + i).val() / 100;
                $(".foodName" + i).val(food_name);
                $(".enerc_kcal" + i).val((foodList2[food_name].enerc_kcal * g).toFixed());
                $(".protein" + i).val((foodList2[food_name].protein * g).toFixed(1));
                $(".lipid" + i).val((foodList2[food_name].lipid * g).toFixed(1));
                $(".carbohydrate" + i).val((foodList2[food_name].carbohydrate * g).toFixed(1));
                $(".fibtg" + i).val((foodList2[food_name].fibtg * g).toFixed(1));
                $(".ca" + i).val((foodList2[food_name].ca * g).toFixed());
                $(".fe" + i).val((foodList2[food_name].fe * g).toFixed(1));
                $(".vita_rae" + i).val((foodList2[food_name].vita_rae * g).toFixed(1));
                $(".vitd" + i).val((foodList2[food_name].vitd * g).toFixed(1));
                $(".vitk" + i).val((foodList2[food_name].vitk * g).toFixed());
                $(".thiahcl" + i).val((foodList2[food_name].thiahcl * g).toFixed(2));
                $(".ribf" + i).val((foodList2[food_name].ribf * g).toFixed(2));
                $(".vitc" + i).val((foodList2[food_name].vitc * g).toFixed());
                $(".nacl_eq" + i).val((foodList2[food_name].nacl_eq * g).toFixed(1));
                // console.log($(".protein" + i).val());
            } else {
                alert("0以上を入力してください");
                $(".g" + i).val('');
            }
        });
    };


    // 合計値計算
    for (let b = 0; b < $('.search').length; b++) {
        $(".g" + b).change(function () {
            let g_arr = [];
            let enerc_kcal_arr = [];
            let protein_arr = [];
            let lipid_arr = [];
            let carbohydrate_arr = [];
            let fibtg_arr = [];
            let ca_arr = [];
            let fe_arr = [];
            let vita_rae_arr = [];
            let vitd_arr = [];
            let vitk_arr = [];
            let thiahcl_arr = [];
            let ribf_arr = [];
            let vitc_arr = [];
            let nacl_eq_arr = [];
            for (let i = 0; i < $(".weight").length; i++) {
                if ($('.weight').eq(i).val() > 0) {
                    let g_weight_total = $(".g" + i).val();
                    let enerc_kcal_weight_total = $(".enerc_kcal" + i).val();
                    let protein_weight_total = $(".protein" + i).val();
                    let lipid_weight_total = $(".lipid" + i).val();
                    let carbohydrate_weight_total = $(".carbohydrate" + i).val();
                    let fibtg_weight_total = $(".fibtg" + i).val();
                    let ca_weight_total = $(".ca" + i).val();
                    let fe_weight_total = $(".fe" + i).val();
                    let vita_rae_weight_total = $(".vita_rae" + i).val();
                    let vitd_weight_total = $(".vitd" + i).val();
                    let vitk_weight_total = $(".vitk" + i).val();
                    let thiahcl_weight_total = $(".thiahcl" + i).val();
                    let ribf_weight_total = $(".ribf" + i).val();
                    let vitc_weight_total = $(".vitc" + i).val();
                    let nacl_eq_weight_total = $(".nacl_eq" + i).val();

                    // 配列にpush
                    g_arr.push(Number(g_weight_total));
                    enerc_kcal_arr.push(Number(enerc_kcal_weight_total));
                    protein_arr.push(Number(protein_weight_total));
                    lipid_arr.push(Number(lipid_weight_total));
                    carbohydrate_arr.push(Number(carbohydrate_weight_total));
                    fibtg_arr.push(Number(fibtg_weight_total));
                    ca_arr.push(Number(ca_weight_total));
                    fe_arr.push(Number(fe_weight_total));
                    vita_rae_arr.push(Number(vita_rae_weight_total));
                    vitd_arr.push(Number(vitd_weight_total));
                    vitk_arr.push(Number(vitk_weight_total));
                    thiahcl_arr.push(Number(thiahcl_weight_total));
                    ribf_arr.push(Number(ribf_weight_total));
                    vitc_arr.push(Number(vitc_weight_total));
                    nacl_eq_arr.push(Number(nacl_eq_weight_total));
                } else {

                    // 数値が0の場合０を入れる。入れないとNANで数値が返る
                    let g_weight_total = '0';
                    let enerc_kcal_weight_total = '0';
                    let protein_weight_total = '0';
                    let lipid_weight_total = '0';
                    let carbohydrate_weight_total = '0';
                    let fibtg_weight_total = '0';
                    let ca_weight_total = '0';
                    let fe_weight_total = '0';
                    let vita_rae_weight_total = '0';
                    let vitd_weight_total = '0';
                    let vitk_weight_total = '0';
                    let thiahcl_weight_total = '0';
                    let ribf_weight_total = '0';
                    let vitc_weight_total = '0';
                    let nacl_eq_weight_total = '0';
                    g_arr.push(Number(g_weight_total));
                    enerc_kcal_arr.push(Number(enerc_kcal_weight_total));
                    protein_arr.push(Number(protein_weight_total));
                    lipid_arr.push(Number(lipid_weight_total));
                    carbohydrate_arr.push(Number(carbohydrate_weight_total));
                    fibtg_arr.push(Number(fibtg_weight_total));
                    ca_arr.push(Number(ca_weight_total));
                    fe_arr.push(Number(fe_weight_total));
                    vita_rae_arr.push(Number(vita_rae_weight_total));
                    vitd_arr.push(Number(vitd_weight_total));
                    vitk_arr.push(Number(vitk_weight_total));
                    thiahcl_arr.push(Number(thiahcl_weight_total));
                    ribf_arr.push(Number(ribf_weight_total));
                    vitc_arr.push(Number(vitc_weight_total));
                    nacl_eq_arr.push(Number(nacl_eq_weight_total));
                };
            };

            // 配列の中身を足す用
            let g_total = 0;
            let enerc_kcal_total = 0;
            let protein_total = 0;
            let lipid_total = 0;
            let carbohydrate_total = 0;
            let fibtg_total = 0;
            let ca_total = 0;
            let fe_total = 0;
            let vita_rae_total = 0;
            let vitd_total = 0;
            let vitk_total = 0;
            let thiahcl_total = 0;
            let ribf_total = 0;
            let vitc_total = 0;
            let nacl_eq_total = 0;
            for (let j = 0; j < g_arr.length; j++) {
                g_total += g_arr[j];
                enerc_kcal_total += enerc_kcal_arr[j];
                protein_total += protein_arr[j];
                lipid_total += lipid_arr[j];
                carbohydrate_total += carbohydrate_arr[j];
                fibtg_total += fibtg_arr[j];
                ca_total += ca_arr[j];
                fe_total += fe_arr[j];
                vita_rae_total += vita_rae_arr[j];
                vitd_total += vitd_arr[j];
                vitk_total += vitk_arr[j];
                thiahcl_total += thiahcl_arr[j];
                ribf_total += ribf_arr[j];
                vitc_total += vitc_arr[j];
                nacl_eq_total += nacl_eq_arr[j];
            };

            // 整数、小数点を調整
            g_total = g_total.toFixed();
            enerc_kcal_total = enerc_kcal_total.toFixed();
            protein_total = protein_total.toFixed(1);
            lipid_total = lipid_total.toFixed(1);
            carbohydrate_total = carbohydrate_total.toFixed(1);
            fibtg_total = fibtg_total.toFixed(1);
            ca_total = ca_total.toFixed();
            fe_total = fe_total.toFixed(1);
            vita_rae_total = vita_rae_total.toFixed(1);
            vitd_total = vitd_total.toFixed(1);
            vitk_total = vitk_total.toFixed();
            thiahcl_total = thiahcl_total.toFixed(2);
            ribf_total = ribf_total.toFixed(2);
            vitc_total = vitc_total.toFixed();
            nacl_eq_total = nacl_eq_total.toFixed(1);

            $(".g_result").val(g_total);
            $(".enerc_kcal_result").val(enerc_kcal_total);
            console.log(enerc_kcal_arr);
            console.log(protein_arr);
            console.log(lipid_arr);
            console.log(carbohydrate_arr);
            $(".protein_result").val(protein_total);
            $(".lipid_result").val(lipid_total);
            $(".carbohydrate_result").val(carbohydrate_total);
            $(".fibtg_result").val(fibtg_total);
            $(".ca_result").val(ca_total);
            $(".fe_result").val(fe_total);
            $(".vita_rae_result").val(vita_rae_total);
            $(".vitd_result").val(vitd_total);
            $(".vitk_result").val(vitk_total);
            $(".thiahcl_result").val(thiahcl_total);
            $(".ribf_result").val(ribf_total);
            $(".vitc_result").val(vitc_total);
            $(".nacl_eq_result").val(nacl_eq_total);
        });
    };




});



