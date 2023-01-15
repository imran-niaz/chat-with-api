<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <style>
        /* Add some styling for the chat interface */
        #chat {
            width: 400px;
            height: 300px;
            border: 1px solid black;
            padding: 10px;
            overflow: scroll;
        }
        #chat .message {
            margin-bottom: 10px;
        }
        #chat .message.received {
            text-align: left;
        }
        #chat .message.sent {
            text-align: right;
        }
    </style>
</head>
<body>
    <div id="chat">
        <!-- Display messages received from the CRM -->
        <div class="message received">Hello, how can I help you today?</div>
        <div class="message received">Please let me know if you need any assistance.</div>
    </div>
    <form>
        <input type="text" id="message-input" placeholder="Type your message here...">
        <button type="submit" id="send-button">Send</button>
    </form>
    <script>
        // Get the form and input elements
        var form = document.querySelector("form");
        var input = document.querySelector("#message-input");
        var chat = document.querySelector("#chat");

        // Add an event listener for the form submit event
        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Get the message from the input
            var message = input.value;

            // Send the message to the CRM using the sendMessage function
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Add the sent message to the chat display
                    var div = document.createElement("div");
                    div.classList.add("message");
                    div.classList.add("sent");
                    div.innerHTML = message;
                    chat.appendChild(div);

                    // Clear the input
                    input.value = "";

                    // Scroll the chat to the bottom
                    chat.scrollTop = chat.scrollHeight;
                }
            };
            xhttp.open("POST", "your_api_url", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("message="+message);
        });
    </script>
</body>
</html>
