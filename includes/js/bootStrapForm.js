var formClass = function(options){
    let errorMsg = '';
    var formVars = {

    };
    var root = this;

    this.construct = function(options){
        $.extend(formVars, options);
    };

    root.addOptionLoop = function($optStart=1, $optEnd=10, $id){

        for(var i=$optStart; i<=$optEnd; i++){
            $("#"+ $id).append('<option value="'+i+'">' + i + '</option>');
        }
    };


    root.addHalfValues = function($optStart=50, $optEnd=180, $id){

        for(var i=$optStart; i<=$optEnd; i=i+0.5){
             //alert(i);
             $("#"+ $id).append('<option value="'+i+'">' + i + '</option>');
         }
    };

    root.storeValue = function ($name, $value) {
        localStorage.setItem($name, $value);

    };

    root.validateEmail = function($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
    }
    root.validateAge = function($num) {
        return Number.isInteger($num);
    }
    root.validateHeight = function($num) {
        return Number.isInteger($num);
    }
    root.validate = function(){

        $("#validation").html();
        $('input').each(function () {
            let inputName = $(this).attr('name');
            let inputType = $(this).attr('type');
            let inputValue = $(this).val();

            switch (inputType) {
                case 'emil':
                    errorMsg = validateEmail(inputValue)?errorMsg + " " + inputName + " should be of type "+inputType :errorMsg;
                break;
                case 'inputAge':
                    errorMsg = validateAge(inputValue)?errorMsg + " " + inputName + " should be of type "+inputType :errorMsg;
                break;
                case 'inputHeight':
                    errorMsg = validateHeight(inputValue)?errorMsg + " " + inputName + " should be of type "+inputType :errorMsg;
                break;
            }

           // $("#validation").append("<p class='redText'>Validating: "+inputName+" type here: "+inputType+" &ndash; And the data:"+inputValue+"</p>");

        });
        //$("#validation").append("<p>Validating type here: $type  </p><p>And the data $data</p>");
    };

    root.retrieveFormValues = function(){
      $('select').each(function(){
          let selectName = $(this).attr('name');
          let selectValue = $(this).val();
          let sv = localStorage.getItem(selectName);
          $(this).children("option[value='"+sv+"']").attr('selected','selected');
      });
      $('input[type="text"]').each(function () {
        let inputName = $(this).attr('name');
        let inputType = $(this).attr('type');
        let inputValue = $(this).val();
        let sv = localStorage.getItem(inputName);


        $(this).val(sv);
      });
        $('input[type="email"]').each(function () {
            let inputName = $(this).attr('name');
            let inputType = $(this).attr('type');
            let inputValue = $(this).val();
            let sv = localStorage.getItem(inputName);


            $(this).val(sv);
        });

        $('input[type="phone"]').each(function () {
            let inputName = $(this).attr('name');
            let inputType = $(this).attr('type');
            let inputValue = $(this).val();
            let sv = localStorage.getItem(inputName);


            $(this).val(sv);
        });
      $('input[type="radio"]').each(function () {
          let radioName = $(this).attr('name');
          let radioValue = $(this).val();
          let sv = localStorage.getItem(radioName);
          if(sv === radioValue){
              $(this).prop("checked", true);
          }else{
              $(this).prop("checked", false);
          }

      });
    };

    root.actionForm = function($formdata,currentSelection){
        if(!errorMsg===''){
            $("#errormsg").text(errorMsg);
            return false;
        }
        $.ajax({
            "method": "POST",
            "data": $formdata,
            "url":"/api/formAction.php",
            "success": function ($data) {
                $.ajax({
                    "method": "get",
                    "url": "/api/apiRequest.php",
                    "success": function ($newData) {
                        $("#tbody").html($newData);
                        root.drawAxisTickColors(currentSelection);
                    }
                });
                return true;
            },
            "error": function () {
                alert("oops");
            }
        });


    }



    root.post_ajax_dataX = function(url, encodedata, success) {
        $.ajax({
            type:"POST",
            url:url,
            data :encodedata,
            dataType:"json",
            restful:true,
            contentType: 'application/json',
            cache:false,
            timeout:20000,
            async:true,
            beforeSend :function(data) { },
            success:function(data){
                success.call(this, data);
            },
            error:function(data){
                alert("Error In Connecting");
            }
        });
    }

     root.ajax_data = function(type, url, success){
        $.ajax({
            type:type,
            url:url,
            dataType:"json",
            restful:true,
            cache:false,
            timeout:20000,
            async:true,
            beforeSend :function(data) { },
            success:function(data){
                success.call(this, data);
            },
            error:function(data){
                alert("Error In Connecting");
            }
        });
    }



    root.drawAxisTickColors = function ($val='age') {
        $.ajax({
            url: 'https://www.google.com/jsapi?callback',
            cache: true,
            dataType: 'script',
            success: function () {
                $.ajax({
                    "type":"GET",
                    "url":"/api/formAction.php?chart="+$val,
                    "success": function (res) {
                        const obj = $.parseJSON(res);
                            google.load('visualization', '1', {packages:['corechart'], 'callback' : function(){


                            }});
                    }, "error": function(){
                        alert("oops");
                    }
                });

            }
        });
    }

}