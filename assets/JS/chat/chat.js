function Viewprofile(){
    window.location.href = '../contactInformation/viewContactInfo.php';
}

function Logout(){
    window.location.href = '../Auth/logout.php';
}



document.addEventListener("DOMContentLoaded", function () {
    function _(element) {
        return document.getElementById(element);
    }

    function fetch_user() {
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../controller/chat/chatFatchusers.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let responseData = JSON.parse(this.responseText);

                if (responseData !== null) {
                    let userList = _("name_of_users");
                    userList.innerHTML = "";

                    responseData.forEach(function (user) {
                        let Name = user.name;

                        let button = document.createElement("button");
                        button.innerHTML = "" + Name + "<br><hr>";
                        button.onclick = function () {
                            var input = "<div id='text-input'>";
                            input += "<input type='text' id='myInput' placeholder='Type your message.........'>";
                            input += "<button id='sendButton'>Send</button>";
                            input += "<div id='chat-with'>Chating with <b>"+Name+"</b></div>"; 
                            input +="<div id='chat-display'>";
                            input +="</div>";
                            input += "</div>";
                            _('inner_right_pannel').innerHTML = input;

                            //send messege function
                            _("sendButton").addEventListener("click", function () {
                                sendText(Name);
                            });
                            getAllmassages(Name);
                        };

                        userList.appendChild(button);
                    });
                } else {
                    _("name_of_users").innerHTML = "No users found or there was an error.";
                }
            }
        };
        _("label_chat").removeEventListener("click", fetch_user);
        
    }

    _("label_chat").addEventListener("click", fetch_user);

function sendText(receiverName) {
        let text = _("myInput").value;
        

        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../controller/chat/sendText.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("receiver=" + receiverName + "&message=" + text);
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let response = this.responseText;
                _("myInput").value = "";
            }
        };
        ///reload testing 
        setInterval(function() {
            getAllmassages(receiverName);
        }, 100);    
    }



    function getAllmassages(receiverName) {
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../controller/chat/getMessage.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("receiver=" + receiverName);
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let response = this.responseText;
                let data = JSON.parse(response);
                showAllMesseges(data, receiverName);
            }
        };
    }


    // function showAllMesseges(data,receiverName) {

    //     let container= "";

    //     data.forEach((item)=>{
    //         console.log(item);

    //         let location = "";

    //         if(item.receiver===receiverName)location=`right`

    //         else location =`left`

    //         container += `<div class="chat-bubble ${location}"><span>${item.text}</span></div>`;

    //     });

    //     _('chat-display').innerHTML = container ;
    
    // }

    function showAllMesseges(data, receiverName) {
        
        let container = "";

        data.forEach((item) => {
            let location = item.receiver === receiverName ? 'right' : 'left';
            container += `<div class="chat-bubble ${location}"><span>${item.text}</span></div>`;
        });

        let chatDisplay = document.getElementById('chat-display');
        let isScrolledToBottom = chatDisplay.scrollHeight - chatDisplay.clientHeight <= chatDisplay.scrollTop + 1;

        chatDisplay.innerHTML = container;

        // jodi user agei niche thake scroll up korte parbe
        if (isScrolledToBottom) {
            chatDisplay.scrollTop = chatDisplay.scrollHeight;
        }
    }

            
    
});