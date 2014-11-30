@extends('_layout.chat')

@section('body')
<div class="row">
	<div class="col-lg-12 col-sm-12 columns">
		<ul class="incoming-message" id="incoming">
	
	</ul>
	</div>
</div>


<div class="row">
    <div class="col-lg-2 col-sm-2">
        <input type="file" id="upload-btn">
    </div>
	<div class="col-lg-8 col-sm-8 columns">
		<input type="text" id="chat_input" class="form-control">
	</div>
	<div class="col-lg-2 col-sm-2 columns">
		<a id="btn-send" href="#" class="btn btn-block btn-sm btn-info">SEND</a>
	</div>
</div>

@stop

@section('js')
{{ HTML::script('assets/vendor/jquery/dist/jquery.min.js') }}
<script src="https://cdn.pubnub.com/pubnub.min.js"></script>

{{ HTML::script('assets/js/webrtc.js') }}
<script>(function(){
    // ~Warning~ You must get your own API Keys for non-demo purposes.
    // ~Warning~ Get your PubNub API Keys: http://www.pubnub.com/get-started/
    // The phone *number* can by any string value
    var phone = PHONE({
        number        : '{{$source}}',
        publish_key   : 'pub-c-37979623-3ad7-422d-86c5-b0680959e6d5',
        subscribe_key : 'sub-c-8419106c-778d-11e4-82cc-02ee2ddab7fe',
        ssl           : true
    });

    // As soon as the phone is ready we can make calls
    phone.ready(function(){

        // Dial a Number and get the Call Session
        // For simplicity the phone number is the same for both caller/receiver.
        // you should use different phone numbers for each user.
        var session = phone.dial('{{$destination}}');

    });

    // When Call Comes In or is to be Connected
    phone.receive(function(session){

        // Display Your Friend's Live Video
       updateList(session);
    });

    function updateList(session){
    	 session.connected(function(session){
            phone.message(function( session, message ) {
                console.log(message);
                if(message.type == "text"){
                    var result = "<li class=\"text-right\">"+message.text+"</li>";
                }else if(message.type == "image"){
                     var result = "<li class=\"text-right\"><img src=\""+message.text+"\"></li>";
                }
            	$(".incoming-message").append(result);
			} );
        });
    }

    $('#btn-send').click(function(){
        var message =  $("#chat_input").val();
        sendMessage(message, "text");
    });

    function sendMessage(message, type){
        phone.send({sender: "{{$source}}" ,text : message, type: type});
        var result = "<li>"+message+"</li>";
        $(".incoming-message").append(result);
        $("#chat_input").val("");
    }
    $("#chat_input").keyup(function(event){
        if(event.keyCode == 13){
            var message =  $("#chat_input").val();
            sendMessage(message, "text");
        }
    });

    $("#upload-btn").change(function(){
        readImage(this);
    });

    function readImage(input){
        if ( input.files && input.files[0] ) {
        var FR= new FileReader();
        FR.onload = function(e) {
            console.log(e.target.result);
            var result = "<li><img src=\""+e.target.result+"\"></li>";
            $(".incoming-message").append(result);
            sendMessage(e.target.result, "image");
             //$('#img').attr( "src", e.target.result );
             //$('#base').text( e.target.result );
        };       
        FR.readAsDataURL( input.files[0] );
    }
    }
    
})();</script>
@stop