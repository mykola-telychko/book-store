$(document).ready(function(){

    $('#users').click(function(){

      $('#content').show('#left');

      $('#useradd').click(function(){

          $('#right').show();

          $('#add_user_form').show();

          $('#add_user_sub').click(function(){

              var name = $('#name').val();

              var password = $('#password').val();

              var role = $('#role').val();

              if ( name == '' || password == '' || role == '' ) {

                 $('#show_user_res').show().text('Fill all fields!');

              } else {

              $.post(

                  '<php echo conf::Url; >users',

                  {name:name,password:password,role:role},

                  function(){

                      $('#right').html('<h4>User '+name+' write to db success</h4>');

                      window.setTimeout("window.location='<php echo conf::Url; >admin'", 5000);

                  });
              }
          });

      });

    });

});
