<% include Header %>
<% include BannerBack %>
<div class="page__submitdetails">
  <div class="submitdetails__pager">
    <div class="submitdetails__pager-inner">
      <h2 class="submitdetails__pager-title">
        PAGE FLIGHT NURSE TO REQUEST TRANSPORT:
      </h2>
      <div class="submitdetails__pager-number">
        <% if $PhoneNumber %>
          $PhoneNumber
        <% else %>
          -------
        <% end_if %>
      </div>
    </div>
  </div>

  <div class="submitdetails__form">
    <h1 class="submitdetails__form-bigtitle">Submit Details</h1>
    <% if $formSuccess() %>
      <h3 class="successmessage">$SuccessMessage</h3>
    <% end_if %>
    $SubmitDetailsForm
  </div>
</div>

<%--$NewsletterForm--%>
<% include Footer %>