<% include Header %>
<% include BannerBack backlink='stories' %>
<div class="page__story">

  <% with $Story %>

    <h1 class="story-title">$Title</h1>
    <h4 class="article-date">$Date.Nice</h4>

    <div class="story-content">
      <% if $Image %>
        <img class="story-image" src="$Image.URL" alt="picture">
      <% end_if %>

      <div class="story-text">$Content</div>
    </div>
  <% end_with %>
</div>
<%--$NewsletterForm--%>
<% include Footer %>
<% include FloatingDonate %>