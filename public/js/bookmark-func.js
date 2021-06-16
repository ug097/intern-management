// 気になるボタン押下時
$(function(){
    $('.kininaru-btn').on('click',function(){
        var click_button = $(this);
        var status = click_button.children('input[name="status"]').val();
        var client_id = click_button.children('input[name="client_id"]').val();
        var job_offer_id = click_button.children('input[name="job_offer_id"]').val();
        var location_home = $('meta[name="home"]').attr('content');
        console.log(location_home);
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },    
            type: 'POST',
            url: location_home + '/bookmark_regist',
            data: {
                status: status,
                client_id: client_id,
                job_offer_id: job_offer_id
            },
            cache: false,
        }).done(function(data){
            console.log('Ajax Success');
            
            // 上下２ヶ所にある企業気になるボタンの場合、押してない方のボタンを取得
            if(click_button.hasClass('client')) var another_button = $('.client').not(click_button);
            
            switch (data) {
                case '0':
                    //クリックした企業/求人情報の、気になるステータスを変更
                    click_button.children('input[name="status"]').val(1);
                    //クリックした気になるボタンに色をつける
                    click_button.css('background', 'orange');
                    click_button.css('border-color', 'orange');
                    // 上下２ヶ所にある企業気になるボタンの場合、押してない方のボタンも処理
                    if(click_button.hasClass('client')){
                        another_button.children('input[name="status"]').val(1);
                        another_button.css('background', 'orange');
                        another_button.css('border-color', 'orange');
                    }
                break;
                case '1':
                    //クリックした企業/求人情報の、気になるステータスを変更
                    click_button.children('input[name="status"]').val(0);
                    //クリックした気になるボタンの色を戻す
                    click_button.css('border-color', '#327DEA');
                    if(click_button.hasClass('blue-button')){ 
                        // OFF時が青いボタン
                        click_button.css('background', '#327DEA');
                    }else{ // OFF時が白いボタン
                        click_button.css('background', 'white');
                    }
                    // 上下２ヶ所にある企業気になるボタンの場合、押してない方のボタンも処理
                    if(click_button.hasClass('client')){
                        another_button.children('input[name="status"]').val(0);
                        another_button.css('border-color', '#327DEA');
                        if(another_button.hasClass('blue-button')){ 
                            // OFF時が青いボタン
                            another_button.css('background', '#327DEA');
                        }else{ // OFF時が白いボタン
                            another_button.css('background', 'white');
                        }
                    }
                break;
                case 'regist_error':
                    alert('気になる登録に失敗しました。');
                break;
                case 'remove_error':
                    alert('気になる解除に失敗しました。');
                break;
            }

        }).fail(function(data) {
            console.log('Ajax Error');
        });
    });
    $('.kininaru-btn-already').on('click',function(){
        var click_button = $(this);
        var client_id = $(click_button).data('client-id');
        var status = 1;
        var job_offer_id = $(click_button).data('job-offer-id');
        var location_home = $('meta[name="home"]').attr('content');
        var kigyou_div = $(this).closest('div.kigyo');
        var job_offer_div = $(this).closest('div.kyujin');
        
        console.log(kigyou_div);
        console.log(job_offer_div);        
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },    
            type: 'POST',
            url: location_home + '/bookmark_regist',
            data: {
                status: status,
                client_id: client_id,
                job_offer_id: job_offer_id
            },
            cache: false,
        }).done(function(data){
            console.log('Ajax Success');
            console.log(job_offer_id);
            if(!job_offer_id){
                $(kigyou_div).fadeOut();
            }else{
                $(job_offer_div).fadeOut();
            }
        }).fail(function(data) {
            console.log('Ajax Error');
        });
        return false;
    });
});