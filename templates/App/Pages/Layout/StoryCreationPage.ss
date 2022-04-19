<% include Header %>
<% include BannerBack backlink='stories' %>
<div class="page__storycreation">

  <% if $formSuccess() %>
    <h1 class="storycreation-title">STORY SUBMITTED!</h1>
  <% else %>
    <h1 class="storycreation-title">SHARE YOUR STORY</h1>
    <% if $Content %>
      <div class="storycreation-content">$Content</div>
    <% end_if %>
  <% end_if %>


  <% if $formSuccess() %>
    <h3>$SuccessMessage</h3>
  <% else %>
    $StoryForm
  <% end_if %>
</div>


<%--$NewsletterForm--%>
<% include Footer %>
<% include FloatingDonate %>