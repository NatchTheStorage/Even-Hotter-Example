<div class="hangarvisitform">
  <div class="hangarvisitform-inner">
    <form $FormAttributes>

      <fieldset class="hangarvisitform-form">
        <h2 class="hangarvisitform-title-desktop">Find out about your Waikato westpac rescue helicopters<br></h2>
        <div class="hangarvisitform-label">Name</div>
        $Fields.dataFieldByName('Name')
        $Fields.dataFieldByName('Organisation')
        $Fields.dataFieldByName('Email')
        $Fields.dataFieldbyName('Date')
        $Fields.dataFieldbyName('Subsite')
        $Fields.dataFieldByName('SecurityID')
        $Fields.dataFieldByName('Captcha')
        <% loop $Actions %>$Field<% end_loop %>
      </fieldset>
    </form>
  </div>
</div>
