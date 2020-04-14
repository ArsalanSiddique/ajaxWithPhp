<?php
    // if(isset($_POST["send"])) {
    //     
    // }
?>

<div class="row" style="margin:0px;" id="sendForm">
    <div class="col-sm-12" style="margin:0px;">
        <form action="" method="post">
            <div class="form-group form-inline" id="mydiv">
                <input type="text" class="form-control" style="margin-left:3%;width:85%;" id="message" placeholder="Type your message" /> &nbsp;
                <input type="hidden" id="receiver" value="<?php echo $_REQUEST["id"] ?>" /> 
                <button class="btn btn-success" type="submit" onclick="send()"><i class="fa fa-paper-plane"></i> &nbsp; Send </button>
            </div>
        </form>
    </div>
</div>