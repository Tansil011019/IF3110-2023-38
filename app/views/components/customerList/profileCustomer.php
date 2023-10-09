<?php

function profileCustomer($i, $name, $email)
{
    $modalId = "myModal-" . $i; // Buat ID modal yang unik
    $html = <<< "EOT"
        <script src="public/js/costomer-list.js"></script>
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
                <button class="kick-customer" data-customer-id="$i">
                    <img src=public/images/bookin-customerlist-remove.svg>
                </button>
            </div>
        </div>
        <div id="$modalId" class="modal-confirmation">
            <div class="modal-content">
                <div class="confirmation-label">Are you sure want to remove this customer?</div>
                <div class="confirmation-button">
                    <button id="confirm-kick" data-customer-id="$i" onclick="onDeleteClick('$email')">Yes</button>
                    <button id="cancel-kick" data-customer-id="$i">No</button>
                    <script src="public/js/costomer-list.js"></script>
                </div>
            </div>
        </div>
    EOT;
    return $html;
}
