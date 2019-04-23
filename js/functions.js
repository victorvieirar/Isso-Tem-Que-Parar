var page = 1;

$(window).ready(function() {
    $("button#btn-message").click(openPopup);
    $("i.fa-times").click(closePopup);
    $(window).keyup(detectKey);
    $("button#btn-submit").click(sendMessage);
    $("button#btn-posts").click(openPosts);
    
    $(window).scroll(function() {
        if($(window).scrollTop() >= (page*($(window).height()))-20) {
            page += 1;
            loadPosts(page);
        }
    });
});

function detectKey(evt) {
    if(evt.keyCode == 27) {
        closePopup();
    }
}

function openPosts() {
    $("html, body").animate({
        scrollTop: $(window).height()
    }, 200);
}

function loadPosts(page) {
    $.ajax({
        method: "POST",
        url: "php/action/load.php",
        data: { 
            page: page
        }
    })
    .done(function(response) {
        response = $.parseJSON(response);
        if(response.success) {
            response.posts.forEach(post => {
                var card = $('<div class="card"></div>');
                var cardBody = $('<div class="card-body"></div>');
                var cardText = $('<p class="card-text">'+post.message+'</p>');
                cardBody.append(cardText);
                card.append(cardBody);
                $(".card-columns").append(card);
            });
        } else {
            alert(response.msg);
        }
    })
    .fail(function(jqXHR, textStatus, err) {
        alert(response.err);
    });
}

function openPopup() {
    $("#tell").css('display', 'block').animate({
        top: 0,
        height: '100vh'
    }, 200);
    $("textarea#message").trigger("focus");
}

function closePopup() {
    $("#tell").animate({
        top: '100vh',
        height: '0vh'
    }, 200).fadeOut(200);
}

function sendMessage() {
    var message = $("textarea#message").val();

    $.ajax({
        method: 'POST',
        url: 'php/action/post.php',
        data: {
            post: true,
            message: message
        }
    })
    .done(function(response) {
        response = $.parseJSON(response);
        if(response.success) {
            closePopup();
            alert("Sucesso ao publicar história. Muito obrigado!");
        } else {
            alert(response.msg);
        }
    })
    .fail(function(jqXHR, textStatus, err) {
        alert(err);
    });
}