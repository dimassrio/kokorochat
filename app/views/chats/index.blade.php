@extends('_layout.chat')

@section('body')
<div class="container">
    
    <div class="bg-message">
        <div class="row">
            <div class="large-2 medium-2 small-2 text-center columns">
                <!-- echo picture-->
            </div>
            <div class="large-8 medium-10 small-10 text-center end columns">
                <ul class="incoming-message" id="incoming">          
                </ul>
            </div>
        </div>
    </div>

    <div class="form-send">
        <div class="row">
            <div class="large-offset-1 medium-offset-11 large-10 medium-10 small-12 text-center">
                <div class="row collapse">
                  <div class="large-10 medium-10 small-10 columns">
                    <input type="text" id="chat_input" class="form-control" placeholder="text message">
                  </div>
                  <div class="large-2 medium-2 small-2 text-center columns">
                    <a href="#" class="button red postfix">Send</a>
                  </div>
                </div>
            </div>
        </div>
        <div class="chat-menu">
        <div class="row icon">
            <a href="">
                <div class="large-offset-1 medium-offset-1 small-offset-1 large-2 medium-2 small-2 columns">
                    <i class="fa fa-plus"></i>
                </div>
            </a>
            <a href="">
                <div class="large-2 medium-2 small-2 columns">
                    <i class="fa fa-smile-o "></i>
                </div>
            </a>
            <a href="">
                <div class="large-2 medium-2 small-2 columns">
                    <i class="fa fa-picture-o "></i>
                </div>
            </a>
            <a href="">
                <div class="large-2 medium-2 small-2 columns">
                    <i class="fa fa-microphone "></i>
                </div>
            </a>
            <a href="">
                <div class="large-2 medium-2 small-2 columns end">
                    <i class="fa fa-send-o "></i>
                </div>
            </a>       
        </div>

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
                if(message.sender == phone.number){
            	   var result = "<li class=\"text-left\">"+message.text+"</li>";
                }else{
                    var result = "<li class=\"text-right\">"+message.text+"</li>";
                }
            	$(".incoming-message").append(result);
			} );
        });
    }

    $('#btn-send').click(function(){
       sendMessage();
    });

    function sendMessage(){
         var message =  $("#chat_input").val();
        phone.send({sender: "{{$source}}" ,text : message});
        var result = "<li>"+message+"</li>";
        $(".incoming-message").append(result);
        $("#chat_input").val("");
    }
    $("#chat_input").keyup(function(event){
        if(event.keyCode == 13){
            sendMessage();
        }
    });

})();</script>
@stop