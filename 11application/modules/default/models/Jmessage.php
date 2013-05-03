<?php

class Model_Jmessage {

    static function messSucc($message) {
        ?><script>$().toastmessage('showSuccessToast', "<?= $message; ?>");</script><?php
    }

    static function messWarn($message) {
        ?><script>$().toastmessage('showWarningToast', "<?= $message; ?>");</script><?php
    }

}
?>
