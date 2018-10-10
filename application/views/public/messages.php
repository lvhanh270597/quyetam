<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="assets/css/message.css">

<html>
<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<style>
    #pad{
        padding-top: 80px;
    }
</style>

</head>
<body>


<div class="container" id="pad">
<!-- Card -->
<div class="card card-cascade">

  <!-- Card image -->
  <div class="view view-cascade gradient-card-header blue-gradient">    
  
    <h2 class="card-header-title mb-3">
    No message
    </h2>    
  </div>

  <div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
            <br>
            <div class="col-md-12"> 
              <h6> No message </h6>
            </div>
        <!--
            <div class="chat_list active_chat" id="1">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>                        
            <div class="chat_list" id="2">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>    
            <div class="chat_list" id="3">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div> 
            -->         
          </div>
        </div>
        <script>                   
        </script>
        <div class="mesgs">
          <div class="msg_history">         
            <!--
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Apollo University, Delhi, India Test</p>
                <span class="time_date"> 11:01 AM    |    Today</span> 
              </div>
            </div>

            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="received_msg">
                    <div class="received_withd_msg">
                    <p>We work directly with our designers and suppliers,
                        and sell direct to you, which means quality, exclusive
                        products, at a price anyone can afford.</p>
                    <span class="time_date"> 11:01 AM    |    Today</span>
                    </div>
                </div>
              </div>
          </div>
        -->          
        </div>
        
      </div>
      
<script>
function getDateTime() {
    var now     = new Date(); 
    var year    = now.getFullYear();
    var month   = now.getMonth()+1; 
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds(); 
    if(month.toString().length == 1) {
         month = '0'+month;
    }
    if(day.toString().length == 1) {
         day = '0'+day;
    }   
    if(hour.toString().length == 1) {
         hour = '0'+hour;
    }
    if(minute.toString().length == 1) {
         minute = '0'+minute;
    }
    if(second.toString().length == 1) {
         second = '0'+second;
    }   
    var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;   
     return dateTime;
}
</script>

<script type="text/javascript">
    $("#send_message").click(function(){

       var content = $("input[name='content']").val();       

        $.ajax({
           url:<?php echo '\'http://localhost/easyhere/message/ajaxRequestPost/'.$user['username'].'\',';  ?>
           type: 'POST',
           data: {content: content},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {                
                var output = '\
                <div class="outgoing_msg">\
                <div class="sent_msg">\
                    <p>'+content+'</p> \
                    <span class="time_date">'+getDateTime()+'</span> \
                </div>\
                </div>';
                $(".msg_history").append(output);
                                                
                var from = $(".active_chat").attr('id');
                var full_name = $(".active_chat .fuck").html();
                var time = getDateTime();                

                output = '\
                    <div class="chat_people">\
                        <div class="chat_img"> <img src="<?php echo $image_guess; ?>" alt="sunil"> </div>\
                        <div class="chat_ib">\
                        <h5 class="fuck">'+full_name+'</h5> <h5> <span class="chat_date">'+time+'</span></h5>\
                        <p><strong> Bạn: '+content+'</strong></p> \
                        </div>\
                    </div>';                
                $(".active_chat").html(output);
            }                           
        });
        
        $("input[name='content']").val('');
    });
</script>


<script>
    guess = <?php echo '"'.$user['username'].'"'; ?>;
    setInterval(
        function(){
            $.get(<?php echo '"'.base_url('message/get_message/'.$user['username']).'"';  ?>, function(data, status){                   
                if (!data.match(/null/)) {                                                                       
                    data = JSON.parse(data);                                                                                                             
                    for (var i=0; i<data.length; i++){
                        var info = data[i];                        
                        from = info['from_user'];
                        to = info['to_user'];
                        time = info['time'];
                        content = info['content'];      
                        output = '';
                        if (to != guess){
                            output = '\
                            <div class="incoming_msg">\
                                <div class="incoming_msg_img"> <img src="<?php echo $image_guess; ?>" alt="sunil"> </div>\
                                <div class="received_msg">\
                                    <div class="received_withd_msg">\
                                    <p>' + content + '</p>\
                                    <span class="time_date"> '+time+'</span>\
                                    </div>\
                                </div>\
                            </div>';                            
                        }                                                    
                        $(".msg_history").append(output);                    
                    }                                       
                }                
            });
        },
        2000);
</script>

<script>
// Warn if overriding existing method
if(Array.prototype.equals)
    console.warn("Overriding existing Array.prototype.equals. Possible causes: New API defines the method, there's a framework conflict or you've got double inclusions in your code.");
// attach the .equals method to Array's prototype to call it on any array
Array.prototype.equals = function (array) {
    // if the other array is a falsy value, return
    if (!array)
        return false;

    // compare lengths - can save a lot of time 
    if (this.length != array.length)
        return false;

    for (var i = 0, l=this.length; i < l; i++) {
        // Check if we have nested arrays
        if (this[i] instanceof Array && array[i] instanceof Array) {
            // recurse into the nested arrays
            if (!this[i].equals(array[i]))
                return false;       
        }           
        else if (this[i] != array[i]) { 
            // Warning - two different object instances will never be equal: {x:20} != {x:20}
            return false;   
        }           
    }       
    return true;
}
// Hide method from for-in loops
Object.defineProperty(Array.prototype, "equals", {enumerable: false});

</script>

<script>
    function get_id(data){
        var res = [];
        for (var i=0; i<data.length; i++){
            res.push(data[i]['id']);
        }
        return res;
    }
    var old_data = [0];
    setInterval(
        function(){
            $.get(<?php echo '"'.base_url('message/get_unseen_messages').'"';  ?>, function(data, status){                
                if (data.replace(/\s/g, '').length) {                          
                    data = JSON.parse(data);     
                    if (old_data.equals(get_id(data)) === false){                                    
                        for (var i=data.length - 1; i>=0; i--){
                            var content = data[i]['content'];
                            var from = data[i]['from_user'];
                            var full_name = data[i]['full_name'];
                            var time = data[i]['time'];
                            var link = '"<?php echo site_url('message/t/'); ?>' + from + '"';

                            output = '\
                            <a href='+link+'> <div class="chat_list" id="'+from+'">\
                                <div class="chat_people">\
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>\
                                    <div class="chat_ib">\
                                    <h5 class="fuck">'+full_name+' </h5><h5><span class="chat_date">'+time+'</span></h5>\
                                    <p><strong> '+content+'</strong></p> \
                                    </div>\
                                </div>\
                            </div>   </a> ';                        
                            $('#' + from).parent().remove();
                            $('.inbox_chat').before(output);
                        }
                        
                        old_data = get_id(data);
                    }                                                               
                }                
            });
        },
        2000
    );
</script>

    </div>

</div>
<!-- Card -->
</div>
</div>
    </body>
    </html>    