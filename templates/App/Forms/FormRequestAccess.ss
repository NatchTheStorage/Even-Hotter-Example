<form $FormAttributes>
  <fieldset class="requestaccessform">
    <div class="requestaccessform-label">Email</div>
    $Fields.dataFieldByName('Email')
    $Fields.dataFieldByName('Option')
    $Fields.dataFieldByName('SecurityID')
    $Fields.dataFieldByName('Captcha')
    <% loop $Actions %>
      $Field
    <% end_loop %>
  </fieldset>
</form>
