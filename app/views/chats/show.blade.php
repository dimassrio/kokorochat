@extends('_layout.chat')

@section('body')
<div class="container">
    <div class="row">
        <div class="large-2 medium-2 small-2 text-center columns">
            <!-- echo picture-->
        </div>
        <div class="large-8 medium-10 small-10 text-center end columns">
            <ul class="incoming-message incoming-message-style" id="incoming">          
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="large-offset-1 medium-offset-11 large-10 medium-10 small-12 text-center columns">
            <div class="row collapse">
              <div class="large-10 medium-10 small-10 columns">
                <input type="text" id="chat_input" class="form-control">
              </div>
              <div class="large-2 medium-2 small-2 text-center columns">
                <a href="#" class="button postfix">Send</a>
              </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
{{ HTML::script('assets/vendor/jquery/dist/jquery.min.js') }}
<script src="//js.pusher.com/2.2/pusher.jss"></script>
{{ HTML::script('assets/js/webrtcx.js') }}
<script>
	var datachannel = new DataChannel();

	datachannel.userid = "1234";

	var pusher = new Pusher("8febb3b644e2f765fde9");
	var socketId;

	pusher.connection.bind("state_change", function(states) {
            switch (states.current) {
            case "connected":
            socketId = pusher.connection.socket_id;
            break;
            case "disconnected":
            case "failed":
            case "unavailable":
            break;
          }
        });
	
	datachannel.openSignalingChannel = function(config) {
          var channel = config.channel || this.channel || "default-channel";
          var xhrErrorCount = 0;

          var socket = {
          send: function(message) {
          $.ajax({
          type: "POST",
          url: "/message",
          data: {
          socketId: socketId,
          channel: channel,
          message: message
        },
        timeout: 1000,
        success: function(data) {
        xhrErrorCount = 0;
      },
      error: function(xhr, type) {
      // Increase XHR error count
      xhrErrorCount++;

      // Stop sending signaller messages if it's down
      if (xhrErrorCount > 5) {
      console.log("Disabling signaller due to connection failure");
      datachannel.transmitRoomOnce = true;
    }
  }
});
},
channel: channel
};

// Subscribe to Pusher signalling channel
var pusherChannel = pusher.subscribe(channel);

// Call callback on successful connection to Pusher signalling channel
pusherChannel.bind("pusher:subscription_succeeded", function() {
if (config.callback) config.callback(socket);
});

// Proxy Pusher signaller messages to DataChannel
pusherChannel.bind("message", function(message) {
config.onmessage(message);
});

return socket;
};

</script>
@stop