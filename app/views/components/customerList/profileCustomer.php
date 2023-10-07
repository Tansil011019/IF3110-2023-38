<?php

function profileCustomer($i, $name, $email)
{
    $html = <<< "EOT"
        <div class="profile-customer-container">
            <div class="left-side">
                <div class="list-number">
                    $i
                </div>
                <div class="profile-image-customer">
                    <img src="public/images/profile-picture-default.svg" alt="Pp" />
                </div>
                <div class="identity-customer">
                    <div class="name-customer">
                        $name
                    </div>
                    <div class="email-customer">
                        $email
                    </div>
                </div>
            </div>
            <div class="right-side">
                <button id="kick-customer">
                    <img src=public/images/bookin-customerlist-remove.svg>
                </button>
            </div>
        </div>
    EOT;
    return $html;
}
