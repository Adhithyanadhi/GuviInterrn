$(function () {

    $("#img_upld").hide();
    $("#abt_update").hide();
    $("#change").click(function(){
      $("#img_upld").show();
    });

    $("#abt_edit").click(function(){
      $("#abt").prop("disabled",false);
      $("#abt").prop("autofocus",true);
      $("#abt_edit").hide();
      $("#abt_update").show();
    });

    $("#upload").click(function(){
       var fd = new FormData();
       var files = $("#file")[0].files[0];
       var name = $("#name").val();
       fd.append('file',files);
       fd.append('name',name);
      $.ajax({
            type: 'POST',
            url: 'img.php',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data,status){
            if(data == "right")
              window.location.replace("profile.php?name="+name);
            else
              alert(data);
            }
        });
    });

    $("#abt_update").click(function(){
        var abt = $("#abt").val();
        var name = $("#name").val();
        $.post("abt_update.php",
        {
          name: name,
          abt: abt
        },
        function(data,status){
          if(data == "right")
              window.location.replace("profile.php?name="+name);
          else
              alert(data);
        });
    });
   $("#login").click(function(){
        var l_name = $("#l_name").val();
        var l_password = $("#l_password").val();
       $.post("check.php",
        {
          name: l_name,
          password:l_password
        },
        function(data,status){
            if(data == "right")
                    window.location.replace("profile.php?name="+l_name);
            else
                alert("something wrong login "+data);
        });
    });

    $("#edit").click(function(){
      var n = $("#edit").val();
      window.location.replace("edit.php?name="+n);
    });

    $("#update").click(function(){
        var u_name = $("#name").val();
        var u_contact = $("#contact").val();
        var u_dob = $("#dob").val();
        var u_email = $("#email").val();
        var u_age = $("#age").val();
        $.post("update.php",
        {
          name: u_name,
          contact: u_contact,
          dob: u_dob,
          email: u_email,
          age: u_age
        },
        function(data,status){
            if(data == "right")
              window.location.replace("profile.php?name="+u_name);
            else
                alert("something wrong in update "+ data);
        });
    });
        $.validator.addMethod("pwcheck", function(value) {
       return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) 
           && /[a-z]/.test(value) 
           && /[A-Z]/.test(value) 
           && /\d/.test(value)
           && value.length >= 8 
    });

    $.validator.addMethod("phcheck", function(value) {
       return /^[0][1-9]\d{9}$|^[1-9]\d{9}$/.test(value) // consists of only these
    });

    $.validator.addMethod("uncheck", function(value) {
      var x = true;
      var name = $("#name").val();
        $.ajax({
            url: "dummy.php",
            type: 'POST',
            data: {name: name},
            async: false,
            cache: false,
            timeout: 30000,
            error: function(){
                return true;
            },
            success: function(msg){
              if(msg == name)
                x = false;
              else
                x = true;
            }
        });
        return x
   });

    $.validator.addMethod("minLength", function(value) {
          return value.length >= 8
        // consists of only these
    });
  
    $("#register").validate({
        rules:{
            name: /^\W+$/, // allows letters, numbers, and underscores
            name:{
              required:true,
              minLength: true,
              uncheck: true
            },
            email:{
                required: true,
                email: true
            },
            password:{
              required:true,
              pwcheck: true
            },
            c_password:{
              required:true,
              equalTo: "#password"
            },
            contact:{
              required:true,
              phcheck: true
            },
            dob:{
              required:true
            }
        },
        messages:{
            name: {
              minLength: "Mininum length of 8 characters",
              uncheck: "Already exiting"
            },
            password:{
              pwcheck: "Should contain a number ,an upper and lower case letters"
            },
            c_password: {
              equalTo: "Should be equal to password"
            },
            contact: {
              phcheck: "Enter a valid Phone Number"
            },
            email:{
                email: "Enter a valid email address"
            }
        },
        submitHandler: function(form){
          var name = $("#name").val();
          var contact = $("#contact").val();
          var password = $("#password").val();
          var dob = $("#dob").val();
          var email = $("#email").val();
          $.post(
            "process.php",
            {
              name: name,
              contact: contact,
              password: password,
              dob: dob,
              email: email
            },
            function(data,status){
              if(data == "JSON ERROR")
                alert(data);
              if(data == "right"){
                window.location.replace("profile.php?name="+name);
              }
            }
          );
        }
    });


});


