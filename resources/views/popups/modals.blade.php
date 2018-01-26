<?php
/**
 *  Usage
 *
 *  add attributes to the cliking element
 *  class - alertBox
 *  message - message to be displayed
 *
 */
?>

<div class="modal" id="alertBox" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="alertBoxHeader">{{ __('Information') }}</h4>
            </div>
            <div class="modal-body">
                <div id="alertBoxMessage" class="row-fluid">

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">{{ __('Close') }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script type="text/javascript">
    function alertBox(message, message2) {
        $("#alertBoxMessage").html(message);
        if (typeof message2 !== 'undefined') {
            $("#alertBoxMessage").html(message2);
            $("#alertBoxHeader").html(message);
        }

        $("#alertBox").modal('show');
    }
</script>


<?php
/**
 *  Usage
 *
 *  add attributes to the cliking element
 *  class - confirmBox
 *  message - message to be displayed
 *  href - to go if the action is confirmed
 *
 */
?>

<div class="modal" id="confirmBox" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="confirmBoxHeader">{{ __('Please Confirm Your Action') }}<h4>
            </div>
            <div class="modal-body">
                <div id="confirmBoxMessage" class="row-fluid">

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true" id="confirmModalCancel">{{ __('Cancel') }}</button>
                <button class="btn btn-danger" id="confirmBoxConfirm">{{ __('Confirm') }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
    $LT_CONFIRM_NODE = false;
    var LT_CONFIRM_BOX_STATUS = false;
    var LT_CONFIRM_BOX_CALLBACK = false;

    function confirmBox(message, confirmBtnClass, callback) {
        LT_CONFIRM_BOX_STATUS = false;
        $("#confirmBoxMessage").html(message);
        $("#confirmBox").modal('show');

        if (typeof callback !== 'undefined' && callback) {
            LT_CONFIRM_BOX_CALLBACK = callback;
        } else {
            LT_CONFIRM_BOX_CALLBACK = false;
        }

        if (typeof confirmBtnClass !== 'undefined' && confirmBtnClass) {
            $("#confirmBoxConfirm").addClass(confirmBtnClass);
        }

        return true;
    }

    $(document).ready(function(){
        $(document).on('click', "#confirmBoxConfirm", function() {
            $("#confirmBox").modal('hide');

            if ($LT_CONFIRM_NODE) {
                $LT_CONFIRM_NODE.removeAttr("message");
                $LT_CONFIRM_NODE.trigger('click');
            }
        });

        $(document).on('click', ".confirmBox", function(e) {
            $LT_CONFIRM_NODE = $(this);
            var message = $LT_CONFIRM_NODE.attr('message');
            if(message) {
                $("#confirmBoxMessage").html(message);
                $("#confirmBox").modal('show');
                return false;
            }

            if (!$(this).attr('noredirect')) {
                window.location = $(this).attr('href');
            }
        });
    });
</script>
