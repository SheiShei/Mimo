<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title ; ?></title>
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0">
    <link href="http://localhost/mimo/assets/img/mimologo3.png" rel="icon" type="image/png"  />
    <link rel="stylesheet" href="http://localhost/mimo/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/mimo/assets/fonts/material-icons.css">
    <link rel="stylesheet" href="http://localhost/mimo/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost/mimo/assets/css/custom.css">
    <link rel="stylesheet" href="http://localhost/mimo/assets/css/audplay.css">
    <link rel="stylesheet" href="http://localhost/mimo/assets/css/photoupload.css">
    <link rel="stylesheet" href="http://localhost/mimo/assets/css/browse.css">
    <script type="text/javascript" src="http://localhost/mimo/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="http://localhost/mimo/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/mimo/assets/js/photoupload.js"></script>
    <script type="text/javascript" src="http://localhost/mimo/assets/js/likecomment.js"></script>
    <script type="text/javascript" src="http://localhost/mimo/assets/js/audplay.js"></script>

          <!-- Search NavBar -->
    <script type="text/javascript">

    $(document).ready(function() {
        $('#thought-alert').hide();
        $('#audio-alert').hide();
        $('#video-alert').hide();
        $('#deletes-alert').hide()
        $('#col-alert').hide()
        $('#colec-alert').hide()
        $('.searchbar').keyup(function(e){
            var sWord = $(this).val();
            $('.searchresult').html("");
            if (e.which == 13) {
                e.preventDefault()
                window.location = "http://localhost/mimo/search?q="+sWord;
            }            
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>search',
                data:{
                    searchword:sWord
                },
                success: function(s){
                    if(s!=''){
                        var res = JSON.parse(s);
                        for (var i = 0; i < res.length; i++) {
                            console.log(res[i])
                            $('.searchresult').html($('.searchresult').html()+'<li class="list-group-item sR" ><a href="http://localhost/mimo/myStudio?username='+res[i].username+'"><i class="fa fa-user"></i><span> '+res[i].fullname +' <small>('+res[i].username+')</small></span></a></li>')
                        }
                    }
                },
                error: function(e){
                    console.log(e)
                }
            });


        });//end of searchbar keyup()

        $('#thoughts').click(function() {
            var txt = $("#textarea").val();
            $.ajax({
                type:'POST',
                url: '<?php echo base_url() ?>mimo/thoughts',
                data:{
                    thoughts:txt
                },
                success: function(r){
                    var posts = JSON.parse(r)
                    console.log(posts);
                        $("#thought-alert").fadeIn(500, 0);
                        window.setTimeout(function() {
                          $("#thought-alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                            $('#addThought').modal('hide');
                            location.reload(true);
                          });
                        }, 3000);
                        
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(e);
                }
            });
        });//end of thoughts click()
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>mimo/reviewposts',
            data:{
                
            },
            success: function(s){
                console.log(s)
            },
            error: function(e){
                console.log(e)
            }

        })
        $('#releasebtn').click(function(e) {
            e.preventDefault();
            // var file_data = $('#audioUpload').prop('files')[0];   
            var form_data = new FormData($('#form')[0]);       
            $.ajax({
                type:'POST',
                url: '<?php echo base_url() ?>mimo/audios',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function(r){
                    var audios = JSON.parse(r)
                    console.log(audios)
                    $("#audio-alert").fadeIn(500, 0);
                        window.setTimeout(function() {
                          $("#audio-alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                            $('#addAudio').modal('hide');
                            location.reload(true);
                          });
                        }, 3000);
                   
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(e);
                }
            });
        });
        $('#videobtn').click(function(e) {
            e.preventDefault();
            // var file_data = $('#audioUpload').prop('files')[0];   
            var formdata = new FormData($('#forms')[0]);       
            $.ajax({
                type:'POST',
                url: '<?php echo base_url() ?>mimo/videos',
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                success: function(r){
                    var videos = JSON.parse(r)
                    console.log(videos)
                    $("#video-alert").fadeIn(500, 0);
                        window.setTimeout(function() {
                          $("#video-alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                            $('#addVideo').modal('hide');
                            location.reload(true);
                          });
                        }, 3000);
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(e);
                }
            });
        });
    });
    </script>
    <script type="text/javascript">
    if (window.location.hash && window.location.hash == '#_=_') {
        if (window.history && history.pushState) {
            window.history.pushState("", document.title, window.location.pathname);
        } else {
            // Prevent scrolling by storing the page's current scroll offset
            var scroll = {
                top: document.body.scrollTop,
                left: document.body.scrollLeft
            };
            window.location.hash = '';
            // Restore the scroll offset, should be flicker free
            document.body.scrollTop = scroll.top;
            document.body.scrollLeft = scroll.left;
        }
    }
</script>
</head>