<% include Header %>
<% include PageBanner %>
<div class="page__mediahub">
  $ElementalArea
  <div class="mediahub__downloads">
    <div class="mediahub__downloads-list">
      <% loop $DownloadCards %>
        <% include CardDownload %>
      <% end_loop %>
    </div>
  </div>

</div>
<%--$NewsletterForm--%>
<% include Footer %>
<% include FloatingDonate %>