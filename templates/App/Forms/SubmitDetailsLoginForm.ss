<form autocomplete="off" $AttributesHTML class="referral__form">

  <% if Message %><div class="error">$Message</div><% end_if %>
  <div class="input"><label class="login-label" for="{$FormName}_Email">Email</label>$Fields.dataFieldByName('Email')</div>
  <div class="input"><label class="login-label" for="{$FormName}_Password">Password</label>$Fields.dataFieldByName('Password')</div>
  <a href="/Security/lostpassword" class="lost__password">Forgot password?</a>

  <div class="input input__submit-login"><input type="submit" class="login-button" value="Sign in"></div>
  $Fields.dataFieldByName(SecurityID)

</form>