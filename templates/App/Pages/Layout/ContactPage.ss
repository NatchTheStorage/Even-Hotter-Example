<% include Header %>
<% include BannerBack backlink='' %>
<div class="contactform u-container u-spacing--y">
  <h1 class="contactform-title">Contact Us</h1>
  <% if $formSuccess() %>
    <h2>$SuccessMessage</h2>
  <% else %>
    <p class="contactform-content">$Content</p>
  <% end_if %>

    $ContactForm
</div>
<%--$NewsletterForm--%>
<% include Footer %>