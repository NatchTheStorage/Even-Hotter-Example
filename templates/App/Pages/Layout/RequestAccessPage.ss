<% include Header %>
<% include BannerBack backlink='' %>
<div class="page__requestaccess">
  <div class="requestaccess__form">
    <div class="requestaccess__form-inner">
      <h2 class="requestaccess__form-title">$Title</h2>
      <% if $formSuccess() %>
        <h3>$SuccessMessage</h3>
      <% else %>
        <p class="requestaccess__form-blurb">$Blurb</p>
        $RequestAccessForm
      <% end_if %>

    </div>
  </div>
</div>
<%--$NewsletterForm--%>
<% include Footer %>