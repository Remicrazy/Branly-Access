document.addEventListener('DOMContentLoaded', function () {
  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
      });
    });
  };
});
/*Connection/Disconnection*/
//Modal
$(document).ready(function() {
  //Open Log
  $('#connected').click(function() {
    $('#modal_log').css(
      {
        'display':'block'
      }
    );
  });
  //Close log
  $('#close_log').click(function() {
    $('#modal_log').css(
      {
        'display':'none'
      }
    );
  });
});
//Log user
$(document).ready(function(){
  $('#login').submit(function(e){
    e.preventDefault();
    var data = {
      user: $('#user').val(),
      pwd: $('#pwd').val()
    };
    $.ajax({
      url: "/Vegeta/src/php/user_connection.php",
      type: 'POST',
      data: data,
      dataType: 'json',
        success: function(data) {
          if (data.valid == 1){
            $('#log_success').css({'display' : 'block'});
            setTimeout(function(){
              $('#log_success').css({'display' : 'none'});
              $('#user').val("");
            	$('#pwd').val("")
          	}, 2000);
            setTimeout(function(){
              $('#modal_log').css(
                {
                  'display':'none'
                }
              )
            },500);
            setTimeout(function(){
              location.reload();
            },500);
          }
          else
          {
            $('#log_warning').css({'display' : 'block'});
            setTimeout(function(){
              $('#log_warning').css({'display' : 'none'});
              $('#user').val("");
            	$('#pwd').val("")
          	}, 2000);
          }
        },
        error: function(request, status, error){
          alert(request.responseText);
        }
    });
  });
});
//Disconnected User
$(document).ready(function() {
  $('#disconnected').click(function() {
    $.ajax({
      url: "/Vegeta/src/php/user_disconnection.php",
      type: 'POST'
    });
    setTimeout(function(){
      location.reload();
    },500);
  });
});
/*Connection/Disconnection*/

/*Supervision*/
$(document).ready(function(){
  function MoveStop(){
    $.ajax({
    url: "http://192.168.225.236:88/cgi-bin/CGIProxy.fcgi?cmd=ptzStopRun&usr=Branly&pwd=access",
    type: 'POST'
    });
  };
  function ZoomStop(){
    $.ajax({
    url: "http://192.168.225.236:88/cgi-bin/CGIProxy.fcgi?cmd=zoomStop&usr=Branly&pwd=access",
    type: 'POST'
    });
  };
  $('#MoveRight').click(function(e){
    e.preventDefault();
    $.ajax({
      url: "http://192.168.225.236:88/cgi-bin/CGIProxy.fcgi?cmd=ptzMoveRight&usr=Branly&pwd=access",
      type: 'POST'
    });
    setTimeout(function(){
      MoveStop();
    },500);
  });
  $('#MoveLeft').click(function(e){
    e.preventDefault();
    $.ajax({
      url: "http://192.168.225.236:88/cgi-bin/CGIProxy.fcgi?cmd=ptzMoveLeft&usr=Branly&pwd=access",
      type: 'POST'
    });
    setTimeout(function(){
      MoveStop();
    },500);
  });
  $('#MoveDown').click(function(e){
    e.preventDefault();
    $.ajax({
      url: "http://192.168.225.236:88/cgi-bin/CGIProxy.fcgi?cmd=ptzMoveDown&usr=Branly&pwd=access",
      type: 'POST'
    });
    setTimeout(function(){
      MoveStop();
    },500);
  });
  $('#MoveUp').click(function(e){
    e.preventDefault();
    $.ajax({
      url: "http://192.168.225.236:88/cgi-bin/CGIProxy.fcgi?cmd=ptzMoveUp&usr=Branly&pwd=access",
      type: 'POST'
    });
    setTimeout(function(){
      MoveStop();
    },500);
  });
  $('#ZoomIn').click(function(e){
    e.preventDefault();
    $.ajax({
      url: "http://192.168.225.236:88/cgi-bin/CGIProxy.fcgi?cmd=zoomIn&usr=Branly&pwd=access",
      type: 'POST'
    });
    setTimeout(function(){
      ZoomStop();
    },200);
  });
  $('#ZoomOut').click(function(e){
    e.preventDefault();
    $.ajax({
      url: "http://192.168.225.236:88/cgi-bin/CGIProxy.fcgi?cmd=zoomOut&usr=Branly&pwd=access",
      type: 'POST'
    });
    setTimeout(function(){
      ZoomStop();
    },200);
  });

});
/*Supervision*/

/* Administration*/
$(document).ready(function() {
  //Open Creat
  $('#open_creat').click(function() {
    $('#modal_creat').css(
      {
        'display':'block'
      }
    );
  });
  //Close Creat
  $('#close_creat').click(function() {
    $('#modal_creat').css(
      {
        'display':'none'
      }
    );
  });
});

//Student or Staff
$(document).ready(function() {
  //  Student
  $('#student').click(function() {
    $('.what-class').css(
      {
        'display':'block'
      }
    );
    $('.what-post').css(
      {
        'display':'none'
      }
    );
  });
  // Staff
  $('#staff').click(function() {
    $('.what-post').css(
      {
        'display':'block'
      }
    );
  $('.what-class').css(
      {
        'display':'none'
      }
    );
  });
});

//Refresh Valeur du badge
$(document).ready(function() {
  $('#refresh').click(function(){
    $('#badges').load("index.php #uid");
  });
});

//Send with Ajax
$(document).ready(function() {
  $('#register').submit(function(e){
    e.preventDefault();
  	var data = {
  	  name: $('#name').val(),
      firstname: $('#firstname').val(),
      classroom: $('#classroom').val(),
      job: $('#job').val(),
      gender: $('input[type=radio][name=gender]:checked').attr('value'),
      bday: $('#bday').val(),
    	uid: $('#uid').val()
  	};
    var post = $('input[type=radio][name=post]:checked').attr('value');
    //Student
    if (post == 'student'){
      $.ajax({
      url: "/Vegeta/src/php/add_student.php",
      type: 'POST',
      data: data,
        success: function(data) {
        	$('#notif_success').css({'display' : 'block'});
        	setTimeout(function(){
          	$('#notif_success').css({'display' : 'none'});
          	$('#name').val("");
            $('#firstname').val("");
            $('#bday').val("");
          	$('#classroom').val("")
        	}, 2000);
        },
        error: function(data) {
          $('#notif_warning').css({'display' : 'block'});
          setTimeout(function(){
          	$('#notif_warning').css({'display' : 'none'});
          	$('#name').val("");
            $('#firstname').val("");
            $('#bday').val("");
          	$('#classroom').val("")
        	}, 2000);
        }
      });
    };
    //Staff
    if (post == 'staff'){
      $.ajax({
      url: "/Vegeta/src/php/add_staff.php",
      type: 'POST',
      data: data,
        success: function(data) {
          $('#notif_success').css({'display' : 'block'});
          setTimeout(function(){
            $('#notif_success').css({'display' : 'none'});
            $('#name').val("");
            $('#firstname').val("");
            $('#bday').val("");
            $('#job').val("")
          }, 2000);
        },
        error: function(data) {
          $('#notif_warning').css({'display' : 'block'});
          setTimeout(function(){
            $('#notif_warning').css({'display' : 'none'});
            $('#name').val("");
            $('#firstname').val("");
            $('#bday').val("");
            $('#job').val("")
          }, 2000);
        }
      });
    };
  });
});
/* Administration*/
