<% include Header %>
<% include PageBanner %>

<div class="page__storyholder">
  <% if $SubbannerText %>
    <div class="storyholder__underbanner">
      <div class="storyholder__underbanner-inner">
        <div class="storyholder__underbanner-text">$SubbannerText</div>
        <a href="{$SubbannerLink.getLinkURL}" class="storyholder__underbanner-button">$SubbannerLink.Title</a>
      </div>
    </div>
  <% end_if %>

  <div class="storyholder__content">
    <% include DividerHorizontal %>
    $Content
  </div>
  <% if $StoriesList($init) %>
    <div class="storyholder__stories">
      <div class="storyholder__stories-list">
        <% loop $StoriesList($init) %>
          <% include CardStory LessContent=true %>
        <% end_loop %>
      </div>
      <% include PaginationNavigator Paginate=$StoriesList($init) %>

    </div>
  <% else %>
    <div class="storyholder__stories">
      <h3>Hmm, there do not seem to be any stories here at the moment!</h3>
    </div>
  <% end_if %>

  <% if $GetStoryVideos($init) %>
    <div class="storyholder__videos">
      <% include DividerHorizontal %>
      <div class="storyholder__videos-title">Videos</div>
      <div class="storyholder__videos-list">
        <% loop $GetStoryVideos($init) %>
          <% include CardVideo %>
        <% end_loop %>
      </div>
    </div>
  <% end_if %>
</div>

<%--$NewsletterForm--%>
<% include Footer %>
<% include FloatingDonate %>