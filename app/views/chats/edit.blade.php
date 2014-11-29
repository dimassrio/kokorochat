@extends('_layout.chat')

@section('body')
<div class="row">
	<div class="col-lg-12 col-sm-12 columns">
		<ul class="incoming-message" id="incoming">
	
	</ul>
	</div>
</div>


<div class="row">
	<div class="col-lg-10 col-sm-10 columns">
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
{{ HTML::script('assets/js/webrtcx.js') }}
<script>

$(document).ready(function(){
	var userA = PUBNUB.uuid();
	var pubnubA = PUBNUB.init({
      publish_key: 'pub-c-37979623-3ad7-422d-86c5-b0680959e6d5',
      subscribe_key: 'sub-c-8419106c-778d-11e4-82cc-02ee2ddab7fe',
      uuid: userA
    });
    pubnubA.subscribe({
    	user: 
    });
});
	// Grab a reference to all of our elements
    var connectButton = document.querySelector('#connect'),
        sendButton = document.querySelector('#send'),
        inputField = document.querySelector('#input'),
        responseBox = document.querySelector('#response');
    // Create first "user"
    
    
    // Create second "user"
    var userB = PUBNUB.uuid();
    var pubnubB = PUBNUB.init({
      publish_key: 'pub-c-e26bd37f-0e9b-49db-a2d0-3ce7dada8563',
      subscribe_key: 'sub-c-4860a7f8-ced1-11e2-b70f-02ee2ddab7fe',
      uuid: userB
    });
    // When we hit connect, start the connection
    connectButton.addEventListener('click', function (event) {
      pubnubB.subscribe({
        user: userA,
        callback: function (message) {
          responseBox.innerHTML = message + "<br />" + responseBox.innerHTML;
        }
      });
      sendButton.disabled = false;
      inputField.disabled = false;
      connectButton.disabled = true;
    });
    // When we hit send, send the message over WebRTC Data Channel
    sendButton.addEventListener('click', function (event) {
      if (inputField.value !== '') {
        pubnubA.publish({
          user: userB,
          message: inputField.value
        });
      }
    });

</script>
@stop