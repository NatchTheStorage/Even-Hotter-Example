<% include Header %>
<% include BannerBack backlink='fundraising-events' %>
<div class="page__event">

  <% with $Event %>

    <div class="event-hero">
      <h1 class="event-title">$Title</h1>
    </div>

    <div class="event-details">
      <div class="event-details-inner">
        <div class="event-details-text">
          <% if $Date || $Time %>
            <h2 class="event-date">$Date<% if $Date && $Time %> | <% end_if %> $Time</h2>
          <% end_if %>
          <% if $Location %>
            <h3 class="event-location">Location: $Location</h3>
          <% end_if %>
        </div>
        <% if $ExternalLink %>
          <a class="event-detaillink" href="$ExternalLink.URL">$ExternalLink.Title</a>
        <% end_if %>
      </div>
    </div>

    <div class="event-content">
      <img class="event-image" src="$Image.URL" alt="picture">
      <div class="event-text">$Content</div>
      <% if $InternalLink %>
        <a class="event-link" href="$InternalLink.URL">$InternalLink.Title</a>
      <% end_if %>
    </div>
  <% end_with %>
</div>
<%--$NewsletterForm--%>
<% include Footer %>
<% include FloatingDonate %>