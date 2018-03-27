<?php

class SessionFlash {

    public function setFlash($message, $type = 'red') {
        $_SESSION['flash'] = array (
            'message' => $message,
            'type' => $type 
        );
    }

    public function flash() {
        if(isset($_SESSION['flash'])) {
            ?>
            <div id="alert">
                <div class="row" id="alert_box">
                    <div class="col s12 m12">
                        <div class="card <?php echo $_SESSION['flash']['type'] ?> darken-1">
                            <div class="row">
                                <div class="col s12 m10">
                                    <div class="card-content white-text">
                                        <?php echo $_SESSION['flash']['message'] ?>
                                    </div>
                                </div>
                                <div class="col s12 m2">
                                    <i class="material-icons" id="alert_close" aria-hidden="true">close</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            unset($_SESSION['flash']);
        }
    }

}