<div class="newsletter">
  <div class="newsletter-inner">
    <div class="newsletter-success"></div>
    <% if not $Message %>
      <h3 class="newsletter-title">Find out about your local helicopter</h3>
    <% end_if %>

    <form $FormAttributes>
    <% if $Message %>
        	<p id="{$FormName}_error" class="message $MessageType">$Message</p>
        	<% else %>
      <fieldset class="newsletter-form">
        <h3 class="newsletter-title-desktop">Find out about your $currentSubsite rescue helicopters</h3>
        $Fields.dataFieldByName('Name')
        $Fields.dataFieldByName('Organisation')
        $Fields.dataFieldByName('Email')
        $Fields.dataFieldByName('SecurityID')
        $Fields.dataFieldByName('Captcha')
        <% loop $Actions %>$Field<% end_loop %>
      </fieldset>
          <% end_if %>

    </form>
  </div>
</div>
