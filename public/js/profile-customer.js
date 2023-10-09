var customerListHTML =
  "<?php ob_start(); ?> <?php $i = 1; ?><?php foreach ($customers as $datum): ?><?php echo profileCustomer($i, $datum['name'], $datum['email']); ?><?php $i++; ?><?php endforeach; ?><?php $htmlOutput = ob_get_clean(); ?>";

profileCustomerContainer = document.querySelector(".line-profile-customer");

function onDeleteClick(email) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      profileCustomerContainer.innerHTML = customerListHTML;
    }
  };

  xhr.open("GET", "/customerList/customerListAjax?email=" + email, true);
  xhr.send();

  window.location.reload();
}
